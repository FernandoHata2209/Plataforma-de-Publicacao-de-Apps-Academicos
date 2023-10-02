<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $aplicativos = Aplicativo::where('status', 'Aprovado')
            ->orderBy('created_at', 'desc')
            ->get();
        $usuarios = Usuario::all();

        return view('menu.menu', ['aplicativos' => $aplicativos, 'usuarios' => $usuarios]);
    }

    public function storePublish(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_Aplicativo' => 'required|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,webp',
            'descricao' => 'required|string',
            'tipo' => 'required|in:Matematica,Jogos,Programacao,Redes_computadores,Outros',
            'link_Projeto' => 'required|string',
        ]);

        // Obtém o usuário autenticado
        $user = Auth::user();

        // Salva a imagem
        $image = $request->file('imagem');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('imagesProject'), $imageName);

        // Cria um novo registro de aplicativo associando o criador (usuário autenticado)
        Aplicativo::create([
            'nome_Aplicativo' => $validatedData['nome_Aplicativo'],
            'criador' => $user->id,
            'imagem' => $imageName, // Salva apenas o nome do arquivo da imagem
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

    public function likeProject()
    {
        $user = Auth::user();
    }

    public function show($id)
    {
        // Verifique se o usuário está autenticado
        if (Auth::check()) {
            // Recupere o usuário autenticado
            $user = Auth::user();
        } else {
            // Caso o usuário não esteja autenticado, você pode lidar com isso de acordo com suas necessidades.
            return redirect()->route('login.login')->with('error', 'Faça login para acessar perfis de usuários.');
        }

        // Verifique se o ID fornecido é o mesmo do usuário autenticado
        if ($id == $user->id) {
            // Se o ID for o mesmo do usuário autenticado, exiba seu próprio perfil
            $aplicativos = $user->aplicativos ?? collect();
            return view('user.userPerfil', compact('user', 'aplicativos'));
        } else {
            // Se o ID não for o mesmo, tente encontrar o usuário de destino
            $usuarioDestino = Usuario::find($id);

            // Verifique se o usuário de destino foi encontrado
            if ($usuarioDestino) {
                $aplicativos = $usuarioDestino->aplicativos ?? collect();
                return view('user.userPerfilEnter', ['usuario' => $usuarioDestino, 'aplicativos' => $aplicativos]);
            } else {
                // Lide com o caso em que o usuário de destino não foi encontrado
                return redirect()->route('home')->with('error', 'Perfil não encontrado');
            }
        }
    }

    public function aprovar(Request $request, $id) {
        $aplicativo = Aplicativo::findOrFail($id);
        $aplicativo->update(['status' => 'Aprovado']);
        return redirect()->route('menu.menu')->with('success', 'Aplicativo aprovado com sucesso!');
    }
    
    public function rejeitar(Request $request, $id) {
        $aplicativo = Aplicativo::findOrFail($id);
        $aplicativo->update(['status' => 'Rejeitado']);
        return redirect()->route('menu.menu')->with('success', 'Aplicativo rejeitado com sucesso!');
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
        return redirect()->route('menu.aprovacao')->with('success', 'Aplicativo atualizado com sucesso!');
    }
}
