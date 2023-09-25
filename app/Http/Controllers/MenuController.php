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

    public function teste(){
        return view('menu.teste');
    }

    public function teste2(){
        return view('menu.outroteste');
    }


    public function publish()
    {
        $aplicativos = Aplicativo::all(); // Recupera todos os aplicativos

        return view('menu.publicar', ['aplicativos' => $aplicativos]);
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

    public function indexLogin()
    {
        return view('Login/login');
    }

    public function auth(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'senha' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->senha,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('menu.menu');
        } else {
            return redirect()->route('login.login')->withErrors(['senha' => 'Email ou senha incorretos']);
        }
    }

    public function create()
    {
        return view('Login/register');
    }

    public function storeUser(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'email' => 'required|email|unique:usuarios', // Verifica a unicidade do email na tabela 'usuarios'
            'senha' => 'required|min:6|confirmed',
            'cargo' => 'required|in:equipe_NPI,ciencia_Computacao,engenharia_Software',
        ], [
            'email.unique' => 'Este email já está em uso.', // Mensagem personalizada para a regra 'unique'
        ]);

        // Hash da senha
        $validatedData['senha'] = bcrypt($validatedData['senha']);

        // Criação do usuário
        Usuario::create($validatedData);

        return redirect()->route('login.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('menu.menu');
    }
}
