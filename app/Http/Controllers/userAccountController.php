<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        return view('user.perfil', ['usuarios' => $usuarios]);
    }


    // public function editar(Request $request, $id)
    // {

    //     $aplicativos = Aplicativo::where('id', $id)->first();
    //     if (!empty($aplicativos)) {
    //         return view('user.editarProject', ['aplicativos' => $aplicativos]);
    //     } else {
    //         return redirect()->route('user.userperfil');
    //     }
    // }

    // public function atualizar(Request $request, $id)
    // {
    //     $data = [
    //         'nome_Aplicativo' => $request->nome_Aplicativo,
    //         'descricao' => $request->descricao,
    //         'tipo' => $request->tipo,
    //         'link_Projeto' => $request->link_Projeto,
    //         'status' => 'Em verificação',
    //     ];

    //     // Atualize os dados do aplicativo
    //     Aplicativo::where('id', $id)->update($data);

    //     // Redirecione de volta à interface de aprovação ou outra página relevante
    //     return redirect()->route('user.userperfil', ['id' => $id])->with('success', 'Aplicativo atualizado com sucesso!');
    // }

    // public function show($id)
    // {
    //     // Verifique se o usuário está autenticado
    //     if (Auth::check()) {
    //         // Recupere o usuário autenticado
    //         $user = Auth::user();
    //     } else {
    //         // Caso o usuário não esteja autenticado, você pode lidar com isso de acordo com suas necessidades.
    //         return redirect()->route('menu.menu')->with('error', 'Faça login para acessar perfis de usuários.');
    //     }

    //     // Verifique se o ID fornecido é o mesmo do usuário autenticado
    //     if ($id == $user->id) {
    //         // Se o ID for o mesmo do usuário autenticado, exiba seu próprio perfil
    //         $aplicativos = $user->aplicativos ?? collect();
    //         return view('user.userPerfil', compact('user', 'aplicativos'));
    //     } else {
    //         // Se o ID não for o mesmo, tente encontrar o usuário de destino
    //         $usuarioDestino = Usuario::find($id);

    //         // Verifique se o usuário de destino foi encontrado
    //         if ($usuarioDestino) {
    //             $aplicativos = $usuarioDestino->aplicativos ?? collect();
    //             return view('user.userPerfilEnter', ['usuario' => $usuarioDestino, 'aplicativos' => $aplicativos]);
    //         } else {
    //             // Lide com o caso em que o usuário de destino não foi encontrado
    //             return redirect()->route('home')->with('error', 'Perfil não encontrado');
    //         }
    //     }
    // }

}
