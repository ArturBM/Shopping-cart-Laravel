<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::resource('produtos', ProdutoController::class);
//Route::resource('users', UserController::class);


Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/produtos/details/{slug}', [SiteController::class, 'details'])->name('site.details');
Route::get('/categorias/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'CarrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'AdicionaCarrinho'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'RemoveCarrinho'])->name('site.removecarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'AtualizaCarrinho'])->name('site.atualizacarrinho');
Route::get('/clear', [CarrinhoController::class, 'LimpaCarrinho'])->name('site.limpacarrinho');

Route::view('/login', 'login.form')->name('login.form');
Route::get('/register', [LoginController::class, 'create'])->name('login.create');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('/admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.delete');