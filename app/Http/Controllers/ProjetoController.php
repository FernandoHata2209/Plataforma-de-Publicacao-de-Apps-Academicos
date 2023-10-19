<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use App\Models\comentarios_Aplicativo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjetoController extends Controller
{
    public function mostrarDetalhes($id)
    {
        $aplicativos = Aplicativo::find($id);

        $comentarios = comentarios_Aplicativo::all();

        $usuarios = Usuario::all();

        return view('menu.detalhes', ['aplicativos' => $aplicativos, 'comentarios' => $comentarios, 'usuarios' => $usuarios]);
    }
}
