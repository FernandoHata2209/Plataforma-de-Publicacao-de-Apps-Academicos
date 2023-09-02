<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class userAccountController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();

        return view('UserAccount/userPerfil', ['usuarios' => $usuarios]);
    }

}