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
}
