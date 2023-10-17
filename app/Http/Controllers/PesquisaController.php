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
        $termoPesquisa = $request->input('q');
        $tipoFiltro = $request->input('tipo');
        $statusFiltro = $request->input('status');

        // Pesquisar aplicativos
        $queryAplicativos = Aplicativo::query();

        if ($termoPesquisa) {
            $queryAplicativos->where('nome_Aplicativo', 'LIKE', '%' . $termoPesquisa . '%');
        }

        if ($tipoFiltro) {
            $queryAplicativos->where('tipo', $tipoFiltro);
        }

        if ($statusFiltro) {
            $queryAplicativos->where('status', $statusFiltro);
        }

        $aplicativos = $queryAplicativos->get();

        // Pesquisar usuários
        $queryUsuarios = Usuario::query();

        if ($termoPesquisa) {
            $queryUsuarios->where('nome', 'LIKE', '%' . $termoPesquisa . '%');
        }

        if ($tipoFiltro) {
            $queryUsuarios->where('curso', $statusFiltro);;
        }

        $usuarios = $queryUsuarios->get();

        // Retornar os resultados para a view
        return view('menu.pesquisa', [
            'aplicativos' => $aplicativos,
            'usuarios' => $usuarios,
            'termoPesquisa' => $termoPesquisa
        ]);
    }
}
