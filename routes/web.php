<?php

use App\Http\Controllers\AprovacaoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\userAccountController;
use App\Http\Controllers\PublicarAppController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [MenuController::class, 'index'])->name('menu.menu');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.menu');
Route::get('/menu/jogos', [MenuController::class, 'jogos'])->name('menu.jogos');
Route::get('/menu/tecnologia', [MenuController::class, 'tecnologia'])->name('menu.tecnologia');
Route::get('/menu/redes', [MenuController::class, 'redes'])->name('menu.redes');
Route::get('/menu/programação', [MenuController::class, 'programacao'])->name('menu.programacao');
Route::get('/menu/matematica', [MenuController::class, 'matematica'])->name('menu.matematica');

Route::post('/auth', [UsuarioController::class, 'auth'])->name('auth.user');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('auth.logout');
Route::post('/store', [UsuarioController::class, 'store'])->name('login.store');

Route::post('/aprovacao/aprovar/{id}', [MenuController::class, 'aprovar'])->name('menu.aprovar');
Route::post('/aprovacao/rejeitar/{id}', [MenuController::class, 'rejeitar'])->name('menu.rejeitar');
Route::get('/aprovacao/{id}/editar', [AprovacaoController::class, 'editar'])->name('aprovacao.editar');
Route::put('/aprovacao/{id}', [AprovacaoController::class, 'atualizar'])->name('aprovacao.update');

Route::get('/perfil/{id}', [userAccountController::class, 'index'])->name('user.perfil');

Route::post('publicar/app', [MenuController::class, 'storePublish'])->name('publicar.store');


