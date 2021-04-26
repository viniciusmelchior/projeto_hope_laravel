<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
use App\Models\Instituicao;
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

Route::get('/', function () {
    return view('home.index', ['title' => 'Projeto Hope']);
})->name('principal');

Route::get('/sobre-nos', function () {
    return view('sobre-nos.index', ['title' => 'Sobre Nós']);
})->name('sobre-nos');

Route::get('/parcerias', function () {
    return view('parcerias.index', ['title' => 'Parcerias']);
})->name('parcerias');

Route::get('/doe-ja', function () {
    return view('doe-ja.index', ['title' => 'Doe Já']);
})->name('doe-ja');

Route::get('/form-usuario-cadastro', [RegistroController::class, 'index'])->name('form-usuario-cadastro')->middleware('AlreadyLoggedIn');
Route::post('/registra-usuario', [RegistroController::class, 'registrar'])->name('registra-usuario');

Route::post('/login', [LoginController::class, 'login'])->name('login-registro')->middleware('AlreadyLoggedIn'); 
Route::get('/logout', [LoginController::class, 'logout'])->name('login'); //alterar para post depois

//ROTAS - USUARIO PERFIL
Route::get('/usuario-painel', [UsuarioController::class, 'index'])->name('usuario-painel')->middleware('isLogged');
Route::get('/usuario-deletar', [UsuarioController::class, 'deletarConta'])->name('usuario-deletar')->middleware('isLogged');
Route::get('/form-usuario-editar', [UsuarioController::class, 'editarUsuario'])->name('form-usuario-deletar')->middleware('isLogged');
Route::post('/usuario-editar', [UsuarioController::class, 'salvarEdicao'])->name('salvarEdicao')->middleware('isLogged');

//ROTAS INSTITUICAO
Route::get('/instituicao-form', [InstituicaoController::class, 'index'])->name('instituicao-form')->middleware('isLogged');
Route::post('/instituicao-cadastro', [InstituicaoController::class, 'cadastrar'])->name('instituicao-cadastro')->middleware('isLogged');

//Rotas Doacoes
Route::get('/doacao-form', [DoacaoController::class, 'index'])->name('form-doacao');
Route::post('/doar', [DoacaoController::class, 'doar'])->name('doar');
Route::get('/minhas-doacoes', [DoacaoController::class, 'minhasDoacoes'])->name('minhas-doacoes');

//ROTAS ADMIN

Route::get('/admin', [AdminController::class, 'index']);







