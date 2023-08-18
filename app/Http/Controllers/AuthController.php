<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return view('Menu/menu');
        // Autenticação bem-sucedida, redirecionar para página desejada
    } else {
        // Autenticação falhou, redirecionar de volta para a página de login com mensagem de erro
    }
}

public function showRegistrationForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    // Lógica para criar um novo usuário e autenticá-lo
}
}
