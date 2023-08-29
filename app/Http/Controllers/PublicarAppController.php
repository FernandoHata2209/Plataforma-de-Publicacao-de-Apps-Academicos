<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplicativo;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PublicarAppController extends Controller
{
    public function index()
    {
        $aplicativos = Aplicativo::all(); // Recupera todos os aplicativos

        return view('aplicativos.index', ['aplicativos' => $aplicativos]);
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_Aplicativo' => 'required|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg',
            'descricao' => 'required|string',
            'link_Projeto' => 'required|string',
        ]);

        // Obtém o usuário autenticado
        $user = Auth::user();

        // Salva a imagem
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('images');
        } else {
            $path = null;
        }

        // Cria um novo registro de aplicativo associando o criador (usuário autenticado)
        Aplicativo::create([
            'nome_Aplicativo' => $validatedData['nome_Aplicativo'],
            'criador' => $user->id, // Associa o ID do usuário autenticado à coluna 'criador'
            'imagem' => $path, // Salva o caminho da imagem
            'descricao' => $validatedData['descricao'],
            'link_Projeto' => $validatedData['link_Projeto'],
        ]);

        return redirect()->route('menu.menu');
    }
}
