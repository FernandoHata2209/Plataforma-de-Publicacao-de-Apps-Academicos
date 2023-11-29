<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class userAccountController extends Controller
{
    public function index($id)
    {
        $usuarios = Usuario::find($id);

        if (!$usuarios) {
            // Usuário não encontrado, redirecionar para uma página de erro
            return redirect()->route('menu.menu')->with('error', 'Usuário não encontrado.');
        }
        $aplicativos = $usuarios->aplicativos;

        return view('user.perfil', ['usuarios' => $usuarios, 'aplicativos' => $aplicativos]);
    }

    // Editar Aplicatico
    public function editarProjeto(Request $request, $id)
    {

        $aplicativos = Aplicativo::where('id', $id)->first();
        if (!empty($aplicativos)) {
            return view('user.perfil', ['aplicativos' => $aplicativos]);
        } else {
            return redirect()->route('user.perfil');
        }
    }

    public function atualizarProjeto(Request $request, $id)
    {
        $data = [
            'nome_Aplicativo' => $request->nome_Aplicativo,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'link_Projeto' => $request->link_Projeto,
            'status' => 'Em verificação',
        ];

        // Atualize os dados do aplicativo
        Aplicativo::where('id', $id)->update($data);

        // Redirecione de volta à interface de aprovação ou outra página relevante
        return redirect()->route('user.perfil', ['id' => $id])->with('success', 'Aplicativo encaminhado para analise da equipe do NPI!');
    }

    // Editar Perfil

    public function atualizarPerfil(Request $request, $id){
        $request->validate([
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'senha' => 'sometimes|min:6|confirmed',
            'imagem' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Adapte conforme necessário
        ]);

        $usuario = Usuario::findOrFail($id);
    
        try {  
    
            // Atualiza o e-mail se fornecido
            if ($request->filled('email')) {
                $usuario->email = $request->email;
            }
    
            // Atualiza a senha se fornecida
            if ($request->filled('senha')) {
                $usuario->senha = Hash::make($request->senha);
            }
    
            // Atualiza a foto de perfil se fornecida
            if ($request->hasFile('imagem')) {
                $foto_perfil = $request->file('imagem');
                $nome_foto = $foto_perfil->getClientOriginalName();
                $foto_perfil->move(public_path('mediaProject'), $nome_foto);
                $usuario->imagem = $nome_foto;
            }
    
            // Salva as alterações no banco de dados
            $usuario->save();
    
            return redirect()->route('user.perfil')->with('success', 'Perfil atualizado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->route('user.perfil')->with('error', 'Erro ao atualizar o perfil.');
        }
    }

    public function editarPerfil(Request $request, $id)
    {

        $usuarios = Usuario::where('id', $id)->first();
        if (!empty($usuarios)) {
            return view('user.perfil', ['usuarios' => $usuarios]);
        } else {
            return redirect()->route('user.perfil');
        }

    }


    public function show($id)
    {
        // Verifique se o usuário está autenticado
        $user = Auth::user();

        // Se o usuário estiver autenticado, exiba seu próprio perfil
        if ($user) {
            return view('user.perfil', ['user' => $user]);
        } else {
            // Caso contrário, redirecione para a página de login ou faça o que for apropriado para o seu caso
            return redirect()->route('menu.menu');
        }
    }
}
