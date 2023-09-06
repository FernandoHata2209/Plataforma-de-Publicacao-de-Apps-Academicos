<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AprovacaoController extends Controller
{
    public function index(){
        $aplicativos = Aplicativo::orderBy('created_at', 'desc')->get();

        return view('menu.aprovacao', ['aplicativos' => $aplicativos]);
    }
}
