<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use App\Models\comentarios_Aplicativo;
use App\Models\Usuario;
use App\Models\usuario_Aplicativo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();
        $usuarios = Usuario::all();

        return view('menu.menu', compact('aplicativos', 'usuarios'));
    }

    public function filtrarPorTema($tema)
    {
        // Filtrar aplicativos por tema
        $aplicativos = Aplicativo::where('status', 'aprovado')
            ->where('tipo', $tema)
            ->get();

        return view('menu.menu', compact('aplicativos'));
    }

    public function mostrarComentario($id)
    {
        $aplicativo = Aplicativo::with('comentarios')->find($id);

        if (!$aplicativo) {
            return redirect()->route('menu.menu')->with('error', 'Aplicativo não encontrado.');
        }

        return view('menu.menu', compact('aplicativo'));
    }

    public function storePublish(Request $request)
    {
        // Validação dos dados
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_Aplicativo' => 'required|string',
            'media' => 'required|file|mimes:jpeg,png,jpg,webp,mp4,avi,mov,pdf,rar,zip', // Permite imagens e vídeos
            'descricao' => ['required','string',
                function ($attribute, $value, $fail) {
            
                    if (!empty($value)) {
                        mb_internal_encoding('UTF-8');
                        $wordCount = str_word_count($value);
            
                        if ($wordCount > 255) {
                            $fail("O campo $attribute não pode ter mais de 255 palavras.");
                        }
                    }
                },
            ],
            'tipo' => 'required|in:Matematica,Jogos,Programacao,Redes,Outros',
            'link_Projeto' => 'required|string',
        ]);

        // Obtém o usuário autenticado
        $user = Auth::user();

        // Lida com o upload da mídia (imagem ou vídeo)
        $media = $request->file('media');
        $mediaName = $media->getClientOriginalName();
        $media->move(public_path('mediaProject'), $mediaName);

        // Cria um novo registro de aplicativo associando o criador (usuário autenticado)
        Aplicativo::create([
            'nome_Aplicativo' => $validatedData['nome_Aplicativo'],
            'criador' => $user->id,
            'media' => $mediaName, // Salva apenas o nome do arquivo da mídia
            'descricao' => $validatedData['descricao'],
            'tipo' => $validatedData['tipo'],
            'link_Projeto' => $validatedData['link_Projeto'],
            'status' => 'Em verificação', // Define o status inicial do aplicativo
        ]);

        // Incremente a quantidade de postagens do usuário
        $user->qtd_Postagens += 1;
        $user->save();

        return redirect()->route('menu.menu');
    }

    public function curtir($id)
    {

        if (auth()->check()) {
            // Encontrar o aplicativo pelo ID
            $aplicativo = Aplicativo::find($id);

            // Verificar se o aplicativo foi encontrado
            if (!$aplicativo) {
                return redirect()->back();
            }

            // Verificar se o usuário já curtiu o aplicativo
            $curtidaExistente = Usuario_Aplicativo::where('id_usuario', auth()->id())
                ->where('id_aplicativo', $aplicativo->id)
                ->exists();

            if ($curtidaExistente) {
                return redirect()->back()->with('error', 'Você já curtiu essa publicação.');
            }

            // Criar uma nova entrada na tabela usuario_aplicativo para registrar a curtida
            $usuarioAplicativo = new usuario_aplicativo();
            $usuarioAplicativo->id_usuario = auth()->id();
            $usuarioAplicativo->id_aplicativo = $aplicativo->id;
            $usuarioAplicativo->save();

            // Incrementar o número de curtidas no aplicativo
            $aplicativo->qtd_Curtidas += 1;
            $aplicativo->save();


            return redirect()->back()->with('success', 'Você curtiu o aplicativo com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Você precisa estar logado para curtir.');
        }
    }

    // Comentar no Aplicativo

    public function comentar(Request $request, $id)
    {
        // Encontrar o aplicativo pelo ID
        $aplicativo = Aplicativo::find($id);

        // Verificar se o aplicativo foi encontrado
        if (!$aplicativo) {
            return redirect()->back()->with('error', 'Aplicativo não encontrado.');
        }

        // Verificar se o usuário está autenticado
        if (auth()->check()) {
            // Validar o request
            $request->validate([
                'comentarios' => 'required|string|max:255', // Adapte as regras de validação conforme necessário
            ]);

            // Criar um novo comentário
            comentarios_Aplicativo::create([
                'usuario_id' => auth()->id(),
                'aplicativo_id' => $aplicativo->id,
                'comentario' => ['required','string',
                function ($attribute, $value, $fail) {
            
                    if (!empty($value)) {
                        mb_internal_encoding('UTF-8');
                        $wordCount = str_word_count($value);
            
                        if ($wordCount > 255) {
                            $fail("O campo $attribute não pode ter mais de 255 palavras.");
                        }
                    }
                },
            ],
            ]);

            // Incrementar o número de comentários no aplicativo
            $aplicativo->qtd_Comentarios += 1;
            $aplicativo->save();

            return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Você precisa estar logado para comentar.');
        }
    }

    // Metodo de Aprovacao
    public function aprovar(Request $request, $id)
    {
        $aplicativo = Aplicativo::where('id', $id)
            ->where('status', 'Em verificação')
            ->first();

        if ($aplicativo) {
            $aplicativo->status = 'Aprovado';
            $aplicativo->save();
            return redirect()->route('menu.menu')->with('success', 'Aplicativo aprovado com sucesso!');
        } else {
            return redirect()->route('menu.menu')->with('error', 'Aplicativo não encontrado ou não está em verificação.');
        }
    }

    public function rejeitar(Request $request, $id)
    {
        $aplicativo = Aplicativo::findOrFail($id);
        $aplicativo->update(['status' => 'Rejeitado']);
        return redirect()->route('menu.menu')->with('success', 'Aplicativo cancelado com sucesso!');
    }

    public function editar(Request $request, $id)
    {

        $aplicativos = Aplicativo::where('id', $id)->first();
        if (!empty($aplicativos)) {
            return view('aprovacao.editar', ['aplicativos' => $aplicativos]);
        } else {
            return redirect()->route('menu.menu');
        }
    }

    public function atualizar(Request $request, $id)
    {
        $data = [
            'nome_Aplicativo' => $request->nome_Aplicativo,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'link_Projeto' => $request->link_Projeto,
        ];

        // Atualize os dados do aplicativo
        Aplicativo::where('id', $id)->update($data);

        // Redirecione de volta à interface de aprovação ou outra página relevante
        return redirect()->route('menu.menu')->with('success', 'Aplicativo atualizado com sucesso!');
    }
}
