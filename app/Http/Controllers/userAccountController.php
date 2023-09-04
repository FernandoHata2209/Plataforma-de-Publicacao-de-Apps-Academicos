<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class userAccountController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();

        return view('UserAccount/userPerfil', ['usuarios' => $usuarios]);
    }

    public function update(Request $request, $id){
        $data =[
            'NomeSala' => $request->NomeSala,
            'Capacidade' => $request->Capacidade,
            'Categoria' => $request->Categoria,
            'Disponivel' => $request->Disponivel,
        ];
        Usuario::where('id', $id)->update($data);
        return redirect()->route('user.perfil');
    }

}