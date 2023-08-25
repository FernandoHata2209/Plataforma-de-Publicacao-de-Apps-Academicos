<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplicativo;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PublicarAppController extends Controller
{
    public function index(){
        return view('Publicar/publicar');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'nome_Aplicativo' => 'required|string',
            'descricao' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'link_Projeto' => 'required|string',
        ]);
    
        $imagem = $request->file('imagem'); // Obter a imagem do request
        $imagemBinaria = file_get_contents($imagem->getRealPath()); // Obter o conteúdo binário da imagem
    
        // Criar um novo registro na tabela Aplicativo
        Aplicativo::create([
            'nome_Aplicativo' => $validatedData['nome_Aplicativo'],
            'descricao' => $validatedData['descricao'],
            'imagem' => $imagemBinaria, // Salvar a imagem em formato binário
            'link_Projeto' => $validatedData['link_Projeto'],
        ]);
    
        return redirect()->route('menu.menu');
    
    }
}
