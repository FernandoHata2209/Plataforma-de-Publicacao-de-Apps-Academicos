<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $aplicativos = Aplicativo::all();

        return view('menu.menu', ['aplicativos' => $aplicativos]);
    }

    public function publish()
    {
        $aplicativos = Aplicativo::all(); // Recupera todos os aplicativos

        return view('menu.publicar', ['aplicativos' => $aplicativos]);
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_Aplicativo' => 'required|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,webp',
            'descricao' => 'required|string',
            'link_Projeto' => 'required|string',
        ]);

        // Obtém o usuário autenticado
        $user = Auth::user();

        // Salva a imagem
        $image = $request->file('imagem');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('imagesProject'), $imageName);

        // Cria um novo registro de aplicativo associando o criador (usuário autenticado)
        Aplicativo::create([
            'nome_Aplicativo' => $validatedData['nome_Aplicativo'],
            'criador' => $user->id,
            'imagem' => $imageName, // Salva apenas o nome do arquivo da imagem
            'descricao' => $validatedData['descricao'],
            'link_Projeto' => $validatedData['link_Projeto'],
        ]);

        return redirect()->route('menu.menu');
    }
}
