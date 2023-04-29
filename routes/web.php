<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('/home', 302);
});


Route::controller(UserController::class)->group(function(){
    Route::get('/home', 'index')
        ->name('users.index');

    Route::delete('/home/{id}', 'destroy')
        ->name('users.destroy');

    Route::get('/home/create', 'create')
        ->name('users.create');

    Route::post('/home', 'store')
        ->name('users.store');

    Route::get('/home/{user}/edit', 'edit')
        ->name('users.edit');
    
    Route::patch('/home/{user}', 'update')
        ->name('users.update');
});