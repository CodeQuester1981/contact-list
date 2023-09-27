<?php

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\People;

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

Route::get('/', [PeopleController::class, 'index']);

Route::get('/people/create', [PeopleController::class, 'create'])->middleware('auth');

Route::post('/people', [PeopleController::class, 'store'])->middleware('auth');

Route::get('/people/{person}/edit', [PeopleController::class, 'edit'])->middleware('auth');

Route::put('/people/{person}', [PeopleController::class, 'update'])->middleware('auth');

Route::delete('/people/{person}', [PeopleController::class, 'delete'])->middleware('auth');


Route::get('/people/{person}', [PeopleController::class, 'show']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);