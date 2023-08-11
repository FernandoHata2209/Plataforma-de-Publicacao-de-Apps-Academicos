<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/menu', function () {
    return view('Menu/menu');
});

Route::get('/login', function(){
    return view('Login/login');
});

Route::get('/register', function(){
    return view('Login/register');
});

Route::get('perfilUser', function(){
    return view('UserAccount/userPerfil');
});