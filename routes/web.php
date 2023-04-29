<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                               |
|--------------------------------------------------------------------------|
|                                                                          | 
| Aqui é onde ficam registradas e configuradas todas as rotas disponiveis  |
| pelo sistema refentes ao uso da API fornecida pelo cliente.                                                           |     
|                                                                          |         
|                                                                          |
*/

//Rota inicial que me direciona a primeira pagina do meu sistema caso eu esteja logado
Route::get('/', [UserController::class, 'index'])->name('home')->middleware(Autenticador::class);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signed');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'create'])->name('user.create'); 
Route::post('/register', [UsersController::class, 'store'])->name('user.store');

Route::middleware(Autenticador::class)->group(function(){
//Rotas associadas aos usuarios da API
Route::controller(UserController::class)->group(function(){
    Route::get('/home', 'index')            ->name('users.index');
    Route::get('/home/create', 'create')    ->name('users.create');
    Route::get('/home/{user}/edit', 'edit') ->name('users.edit');
    Route::post('/home', 'store')           ->name('users.store');
    Route::patch('/home/{user}', 'update')  ->name('users.update');
    Route::delete('/home/{id}', 'destroy')  ->name('users.destroy');
    Route::get('/home/search', 'search')    ->name('users.search');
});

//Rotas associadas aos Posts de cada usuario
Route::controller(PostController::class)->group(function(){
    Route::get('/posts/{id}', 'index')         ->name('posts.index');
    Route::get('/posts/create/{id}', 'create') ->name('posts.create');
    Route::post('/posts/{id}', 'store')        ->name('posts.store');
    Route::get('/posts/show/{id}', 'show')     ->name('posts.show');
});

//Rotas associadas aos comentário feitos em cada post
Route::controller(CommentController::class)->group(function(){
    Route::post('/posts/comments/{id}', 'store')     ->name('comments.store');
    Route::delete('/posts/comments/{id}', 'destroy') ->name('comments.destroy');
});

});