<?php

use App\Http\Controllers\AplicativoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\userAccountController;
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

// Route::get('', function () {
//     return view('Login/login');
// });

Route::get('/', [AplicativoController::class, 'index'])->name('menu.menu');

Route::get('/login', [UsuarioController::class, 'index'])->name('login.login');
Route::post('/auth', [UsuarioController::class, 'auth'])->name('login.auth');

Route::get('/register', [UsuarioController::class, 'create'])->name('login.register');
Route::post('/store', [UsuarioController::class, 'store'])->name('login.store');

Route::get('/perfilUser', [userAccountController::class, 'index'])->name('user.perfil');