<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AprovacaoController extends Controller
{
    public function index()
    {
        $aplicativos = Aplicativo::where('status', 'Em verificação')->get();

        return view('menu.aprovacao', ['aplicativos' => $aplicativos]);
    }

    public function aprovar(Request $request, $id)
    {
        // Obtenha o aplicativo pelo ID
        $aplicativos = Aplicativo::findOrFail($id);

        // Atualize o status de verificação para "Aprovado"
        $aplicativos->update(['status' => 'Aprovado']);

        // Redirecione de volta à interface de aprovação com uma mensagem de sucesso
        return redirect()->route('menu.menu');
    }

    public function rejeitar(Request $request, $id)
    {
        // Obtenha o aplicativo pelo ID
        $aplicativos = Aplicativo::findOrFail($id);

        // Atualize o status de verificação para "Rejeitado"
        $aplicativos->update(['status' => 'Rejeitado']);

        // Redirecione de volta à interface de aprovação com uma mensagem de sucesso
        return redirect()->route('menu.menu');
    }

    public function editar(Request $request, $id)
    {

        $aplicativos = Aplicativo::where('id', $id)->first();
        if (!empty($aplicativos)) {
            return view('aprovacao.editar', ['aplicativos' => $aplicativos]);
        } else {
            return redirect()->route('menu.menu');
        }
    }

    public function atualizar(Request $request, $id)
    {
        $data = [
            'nome_Aplicativo' => $request->nome_Aplicativo,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'link_Projeto' => $request->link_Projeto,

        ];

        // Atualize os dados do aplicativo
        Aplicativo::where('id', $id)->update($data);

        // Redirecione de volta à interface de aprovação ou outra página relevante
        return redirect()->route('menu.aprovacao')->with('success', 'Aplicativo atualizado com sucesso!');
    }
}
