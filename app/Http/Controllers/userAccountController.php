<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class userAccountController extends Controller
{
    public function index(){
        return view('UserAccount/userPerfil');
    }
}