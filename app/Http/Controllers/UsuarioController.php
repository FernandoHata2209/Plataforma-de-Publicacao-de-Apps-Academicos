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

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
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


        Usuario::create($validatedData);

        return redirect()->route('login.login');
    }
}