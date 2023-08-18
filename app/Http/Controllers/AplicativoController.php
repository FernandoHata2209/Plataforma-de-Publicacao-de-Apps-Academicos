<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AplicativoController extends Controller
{
    public function index(){
        return view('Menu/menu');
    }
}
