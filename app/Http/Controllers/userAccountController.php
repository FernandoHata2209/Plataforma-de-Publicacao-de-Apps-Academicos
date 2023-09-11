<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class userAccountController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        $aplicativos = Aplicativo::all();

        return view('UserAccount/userPerfil', ['usuarios' => $usuarios, 'aplicativos' => $aplicativos]);
    }

    public function editar(Request $request, $id)
    {

        $aplicativos = Aplicativo::where('id', $id)->first();
        if (!empty($aplicativos)) {
            return view('user.editarProject', ['aplicativos' => $aplicativos]);
        } else {
            return redirect()->route('user.userperfil');
        }
    }

    public function atualizar(Request $request, $id)
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
        return redirect()->route('user.userperfil', ['id' => $id])->with('success', 'Aplicativo atualizado com sucesso!');
    }

}