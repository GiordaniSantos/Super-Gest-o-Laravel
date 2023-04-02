<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

/* rota de login manual
Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');
*/


/*/admin*/ /* rota de login manual
Route::prefix('/admin')->middleware('autenticacao')->group(function(){
    Route::get('/clientes', function() {
        echo "clientes";
    })->name('admin.clientes');
    
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('admin.fornecedores');
    
    Route::get('/produtos', function() {
        echo "produtos";
    })->name('admin.produtos');
});
*/

/*rota de login pelo jetstream (autenticacao jetstream)*/
Route::fallback(function(){
    echo "A rota acessada não existe. <a href=".route('site.index').">Clique aqui</a> para ir para a página inicial!";
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.admin');

    Route::get('/cliente', [\App\Http\Controllers\ClienteController::class, 'index'])->name('admin.cliente');
    
    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('admin.fornecedor');
    Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('admin.fornecedor.listar');
    Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('admin.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('admin.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('admin.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'editar'])->name('admin.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('admin.fornecedor.excluir');

    //produtos
    Route::resource('produto', \App\Http\Controllers\ProdutoController::class);
});
