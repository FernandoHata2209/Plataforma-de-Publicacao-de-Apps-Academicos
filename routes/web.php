<?php

use App\Http\Controllers\AprovacaoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\userAccountController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PesquisaController;
use App\Http\Controllers\ProjetoController;
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
Route::get('/menu/{tema}', [MenuController::class, 'filtrarPorTema'])->name('menu.filtrartipo');
Route::get('/menu/{id?}', [Menucontroller::class, 'mostrarComentario'])->name('menu.menu');
Route::get('/projeto/{id}', [ProjetoController::class, 'mostrarDetalhes'])->name('menu.detalhes');

Route::post('/projeto/aplicativos/comentar/{id}', [ProjetoController::class, 'comentar'])->name('menu.detalhes.comentar');

Route::get('/aplicativos/{id}/editar', [userAccountController::class, 'editar'])->name('user.perfil');
Route::post('/aplicativos/{id}/atualizar', [userAccountController::class, 'atualizar'])->name('aplicativos.atualizar');

Route::post('/auth', [UsuarioController::class, 'auth'])->name('auth.user');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('auth.logout');
Route::post('/store', [UsuarioController::class, 'store'])->name('login.store');
Route::post('/redefinir-senha', [UsuarioController::class, 'update'])->name('password.reset');

Route::post('/aprovacao/aprovar/{id}', [MenuController::class, 'aprovar'])->name('menu.aprovar');
Route::post('/aprovacao/rejeitar/{id}', [MenuController::class, 'rejeitar'])->name('menu.rejeitar');
Route::get('/aprovacao/{id}/editar', [MenuController::class, 'editar'])->name('aprovacao.editar');
Route::post('/aprovacao/{id}', [MenuController::class, 'atualizar'])->name('aprovacao.atualizar');

Route::get('/perfil/projeto/{id}/editar', [UserAccountController::class, 'editarProjeto'])->name('perfil.projeto.editar');
Route::post('/perfil/projeto/{id}', [UserAccountController::class, 'atualizarProjeto'])->name('perfil.projeto.atualizar');
Route::get('/perfil/{id}', [userAccountController::class, 'index'])->name('user.perfil');
Route::get('/perfil/editar', [UserAccountController::class, 'editarPerfil'])->name('perfil.editar');
Route::match(['post', 'put'], '/perfil/editar/{id}', [userAccountController::class, 'atualizarPerfil'])->name('perfil.atualizar');

Route::post('publicar/app', [MenuController::class, 'storePublish'])->name('publicar.store');

Route::post('/aplicativos/{id}/curtir', [MenuController::class, 'curtir'])->name('aplicativos.curtir');
Route::post('/aplicativos/comentar/{id}', [MenuController::class, 'comentar'])->name('aplicativos.comentar');

Route::get('/pesquisa', [PesquisaController::class, 'pesquisar'])->name('menu.pesquisa');

Route::get('/download/arquivo/{id}', [MenuController::class, 'downloadArquivo'])->name('download.arquivo');


