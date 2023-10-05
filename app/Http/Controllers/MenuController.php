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
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();
        $usuarios = Usuario::all();

        return view('menu.menu', ['aplicativos' => $aplicativos, 'usuarios' => $usuarios]);
    }

    public function jogos()
    {
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();
        $usuarios = Usuario::all();

        return view('menu.jogos', ['aplicativos' => $aplicativos, 'usuarios' => $usuarios]);
    }

    public function programacao()
    {
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();
        $usuarios = Usuario::all();

        return view('menu.programacao', ['aplicativos' => $aplicativos, 'usuarios' => $usuarios]);
    }

    public function redes()
    {
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();
        $usuarios = Usuario::all();

        return view('menu.redes', ['aplicativos' => $aplicativos, 'usuarios' => $usuarios]);
    }

    public function matematica()
    {
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();
        $usuarios = Usuario::all();

        return view('menu.matematica', ['aplicativos' => $aplicativos, 'usuarios' => $usuarios]);
    }

    public function tecnologia()
    {
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();
        $usuarios = Usuario::all();

        return view('menu.tecnologia', ['aplicativos' => $aplicativos, 'usuarios' => $usuarios]);
    }

    public function storePublish(Request $request)
    {
        // Validação dos dados
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_Aplicativo' => 'required|string',
            'media' => 'required|file|mimes:jpeg,png,jpg,webp,mp4,avi,mov', // Permite imagens e vídeos
            'descricao' => 'required|string',
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

    public function likeProject()
    {
        $user = Auth::user();
    }

    // Metodo de Aprovacao
    public function aprovar(Request $request, $id)
    {
        $aplicativo = Aplicativo::findOrFail($id);
        $aplicativo->update(['status' => 'Aprovado']);
        return redirect()->route('menu.menu')->with('success', 'Aplicativo aprovado com sucesso!');
    }

    public function rejeitar(Request $request, $id)
    {
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

    // function Search 

    public function search(){
        
    }
}
