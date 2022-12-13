<?php

use App\Actions\Jetstream\DeleteUser;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Role;
use App\Http\Livewire\RoleUsers;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/usuarios', 'index')->name('usuarios.index');
    Route::get('/crear_usuarios', 'crear')->name('createUser');
    Route::post('/guardarUsuario', 'store')->name('saveUser');
    Route::get('/deleteUsers/{user}', 'destroy')->name('user.destroy');
    Route::patch('/updateUser/{user}', 'update')->name('user.update');
    Route::get('/updateUser/{user}/edit', 'edit')->name('user.edit');
});


    Route::get('admin-users',RoleUsers::class)->name('admiUsers.index');