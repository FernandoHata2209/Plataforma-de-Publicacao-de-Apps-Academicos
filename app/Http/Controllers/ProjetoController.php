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
        $aplicativos = Aplicativo::with('comentarios')->find($id);

        if (!$aplicativos) {
            // Aplicativo não encontrado, redirecione ou exiba uma mensagem de erro
            return redirect()->route('menu.menu')->with('error', 'Aplicativo não encontrado.');
        }

        return view('menu.detalhes', compact('aplicativos'));
    }

    public function comentar(Request $request, $id)
    {
        // Encontrar o aplicativo pelo ID
        $aplicativo = Aplicativo::find($id);

        // Verificar se o aplicativo foi encontrado
        if (!$aplicativo) {
            return redirect()->back()->with('error', 'Aplicativo não encontrado.');
        }

        // Verificar se o usuário está autenticado
        if (auth()->check()) {
            // Validar o request
            $request->validate([
                'comentarios' => 'required|string|max:255', // Adapte as regras de validação conforme necessário
            ]);

            // Criar um novo comentário
            comentarios_Aplicativo::create([
                'usuario_id' => auth()->id(),
                'aplicativo_id' => $aplicativo->id,
                'comentario' => $request->input('comentarios'),
            ]);

            // Incrementar o número de comentários no aplicativo
            $aplicativo->qtd_Comentarios += 1;
            $aplicativo->save();

            return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Você precisa estar logado para comentar.');
        }
    }
}
