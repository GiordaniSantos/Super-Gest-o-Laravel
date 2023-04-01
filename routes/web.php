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

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');



/*/admin*/
Route::prefix('/admin')->middleware('autenticacao')->group(function(){
    Route::get('/clientes', function() {
        echo "clientes";
    })->name('admin.clientes');
    
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('admin.fornecedores');
    
    Route::get('/produtos', function() {
        echo "produtos";
    })->name('admin.produtos');
});



Route::fallback(function(){
    echo "A rota acessada não existe. <a href=".route('site.index').">Clique aqui</a> para ir para a página inicial!";
});