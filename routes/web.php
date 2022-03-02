<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('welcome');
});
//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

//cadastro
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/sobre', function () {
    return view('sobre');
})->middleware('auth');

//sair
Route::get('/logout', [LoginController::class, 'logout']);


//Route::view('/sobre', 'sobre')->middleware('auth');
//Route::redirect('/', 'sobre');


//Rotas com Parâmetros

Route::get('/noticia/{slug}/comentario/{id}', function($slug, $id){
    echo "notica $slug e seu comentario $id ";
});

Route::get('/user/{id}', function($id){
    echo "USUARIO ID $id";
})->name('id');

//Rotas com Nome + Redirect
//route('id');

//Grupo de Rotas

Route::prefix('/config')->group(function (){

    Route::get('/', function(){
        echo 'config';
    });
    
    Route::get('info', function(){
        echo 'info';
    });
});

//notfound
Route::fallback(function(){
    echo "pg não encontrada";
});

//Rotas + Controllers

Route::get('/produtos', [ConfigController::class, 'produtos']);
Route::post('/produtos', [ConfigController::class, 'produtos']);
Route::get('/contato', [ConfigController::class, 'contato']);
Route::post('/contato', [ConfigController::class, 'contato']);

//v6 Route::get('/contato', 'ConfigController@contato');

//Criando um CRUD básico (1/7)

Route::prefix('/tarefas')->group(function(){
    Route::get('/', [TarefasController::class, 'list']);
    
    Route::get('add',  [TarefasController::class, 'add'] );
    Route::post('add',  [TarefasController::class, 'addAction'] );

    Route::get('edit/{id}',  [TarefasController::class, 'edit'] );
    Route::post('edit/{id}',  [TarefasController::class, 'editAction']);

    
    Route::get('delete/{id}', [TarefasController::class, 'del'] );

    
    Route::get('marcar/{id}',  [TarefasController::class, 'done']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
