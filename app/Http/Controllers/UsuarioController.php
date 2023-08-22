<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller 
{
    public function index()
    {
        return view('Login/login');
    }

    public function auth(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->senha,
        ];
        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida
            return redirect()->route('menu.menu');
        } else {
            // Autenticação mal-sucedida
            return redirect()->route('login.login')->with('error', 'Credenciais inválidas. Tente novamente.');
        }
    }

    public function create()
    {
        return view('Login/register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'senha' => 'required|min:6', 'confirmed',
            'cargo' => 'required|in:equipe_NPI,ciencia_Computacao,engenharia_Software',
        ]);

        $validatedData['senha'] = bcrypt($validatedData['senha']);

        Usuario::create($validatedData);

        return redirect()->route('login.login');
    }
}