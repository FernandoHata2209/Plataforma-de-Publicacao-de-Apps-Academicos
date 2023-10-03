<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class UsuarioController extends Controller
{
    public function index()
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
            return redirect()->route('menu.menu')->withErrors(['senha' => 'Email ou senha incorretos']);
        }
    }

    public function create()
    {
        return view('Login/register');
    }

    public function store(Request $request)
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

        return redirect()->route('menu.menu');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('menu.menu');
    }
}
