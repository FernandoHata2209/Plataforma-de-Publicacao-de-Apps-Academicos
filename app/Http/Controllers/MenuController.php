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

        return view('menu.menu', ['aplicativos' => $aplicativos]);
    }

    public function publish()
    {
        $aplicativos = Aplicativo::all(); // Recupera todos os aplicativos

        return view('menu.publicar', ['aplicativos' => $aplicativos]);
    }

    public function store(Request $request)
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
        if (!Auth::check()) {
            // Caso o usuário não esteja autenticado, redirecione para a página de login
            return redirect()->route('login.login')->with('error', 'Faça login para acessar perfis de usuários.');
        }

        // Recupere o usuário autenticado
        $user = Auth::user();

        $aplicativos = $user->aplicativos ?? collect();

        // Verifique se o ID fornecido é o mesmo do usuário autenticado
        if ($id == $user->id) {
            // Se o ID for o mesmo do usuário autenticado, exiba seu próprio perfil
            return view('UserAccount\userPerfil', compact('user', 'aplicativos'));
        } else {
            $usuarioDestino = Usuario::find($id);
            // Verifique se o usuário de destino foi encontrado
            if ($usuarioDestino) {
                return view('UserAccount\UserPerfilEnter', ['usuario' => $usuarioDestino, 'aplicativos' => $aplicativos]);
            } else {
                // Lide com o caso em que o usuário de destino não foi encontrado
                return redirect()->route('home')->with('error', 'Perfil não encontrado');
            }
        }
    }
}
