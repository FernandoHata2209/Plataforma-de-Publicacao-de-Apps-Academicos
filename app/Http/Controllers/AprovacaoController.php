<?php

namespace App\Http\Controllers;

use App\Models\Aplicativo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AprovacaoController extends Controller
{
    public function index(){
        $aplicativos = Aplicativo::all();

        return view('menu.aprovacao', ['aplicativos' => $aplicativos], ['cargo' => Auth::user()->cargo]);
    }
}
