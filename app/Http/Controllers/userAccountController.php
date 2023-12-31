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

    public function atualizarPerfil(Request $request, $id)
    {
        // Obtém o usuário autenticado
        $usuario = Usuario::findOrFail($id);

        // dd($request->all());

        // Atualize os dados do usuário
        $usuario->update([
            'email' => $request->input('email'),
            'senha' => $request->filled('senha') ? Hash::make($request->input('senha')) : $usuario->senha,
        ]);

        if ($request->hasFile('imagem')) {
            $media = $request->file('imagem');
            $mediaName = $media->getClientOriginalName();
            $media->move(public_path('imagesProject'), $mediaName);

            // Atualiza o campo de imagem no banco de dados
            $usuario->update(['imagem' => $mediaName]);
        }

        return redirect()->route('user.perfil', ['id' => $usuario->id])->with('success', 'Perfil atualizado com sucesso.');
    }

    public function editarPerfil()
    {
        // Obtém o usuário autenticado
        $usuario = Auth::user();

        // Verifica se o usuário foi encontrado
        if (!$usuario) {
            return redirect()->route('user.perfil')->with('error', 'Usuário não encontrado.');
        }

        return view('user.editarperfil', ['usuario' => $usuario]);
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
