<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class UsuarioController extends Controller
{
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
            return redirect()->route('menu.menu')->with('sucess', 'Login Realizado!');
        } else {
            return redirect()->route('menu.menu')->with('error', 'Email ou senha incorretos. Por favor, tente novamente.');
        }
    }

    public function store(Request $request)
    {
        // Validação dos dados

        
        
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'sobrenome' => 'required|string',
            'email' => 'required|email|unique:usuarios', // Verifica a unicidade do email na tabela 'usuarios'
            'senha' => 'required|min:6|confirmed',
            'cargo' => 'required|in:Equipe do NPI,Aluno,Professor',
            'curso' => 'required|in:Ciencia da Computação,Engenharia de Software,Nenhum',
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

    public function update(Request $request)
    {
        $user = Usuario::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'E-mail não encontrado']);
        }

        // Atualizar a senha no banco de dados
        $user->senha = Hash::make($request->senha);
        $user->save();

        return redirect()->route('menu.menu')->with('status', 'Senha redefinida com sucesso. Você pode fazer login agora.');
    }
}
