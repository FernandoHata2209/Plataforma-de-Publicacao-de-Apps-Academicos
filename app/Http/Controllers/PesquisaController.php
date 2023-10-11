<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PesquisaController extends Controller
{
    public function pesquisar(Request $request)
    {
        $termoPesquisa = $request->input('termo_pesquisa');

        // Buscar usuários com base no termo de pesquisa
        $usuarios = Usuario::where('nome', 'LIKE', "%{$termoPesquisa}%")
            ->orWhere('email', 'LIKE', "%{$termoPesquisa}%")
            ->get();

        // Buscar aplicativos com base no termo de pesquisa
        $aplicativos = Aplicativo::where('nome_Aplicativo', 'LIKE', "%{$termoPesquisa}%")
            ->orWhere('descricao', 'LIKE', "%{$termoPesquisa}%")
            ->get();

        return view('menu.pesquisa', compact('usuarios', 'aplicativos', 'termoPesquisa'));
    }
}
