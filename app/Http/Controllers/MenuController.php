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
        $aplicativos = Aplicativo::all();

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
            'link_Projeto' => $validatedData['link_Projeto'],
        ]);

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
            // Por exemplo, redirecionar para a página de login.
            return redirect()->route('login.login')->with('error', 'Faça login para acessar perfis de usuários.');
        }

        // Verifique se o ID fornecido é o mesmo do usuário autenticado
        if ($id == $user->id) {
            // Se o ID for o mesmo do usuário autenticado, exiba seu próprio perfil
            return view('UserAccount\userPerfil', compact('user'));
        } else {
            // Se o ID não for o mesmo, tente encontrar o usuário de destino
            $usuarioDestino = Usuario::find($id);

            // Verifique se o usuário de destino foi encontrado
            if ($usuarioDestino) {
                return view('UserAccount\UserPerfilEnter', ['usuarioDestino' => $usuarioDestino]);
            } else {
                // Lide com o caso em que o usuário de destino não foi encontrado
                return redirect()->route('menu.menu')->with('error', 'Perfil não encontrado');
            }
        }
    }
}
