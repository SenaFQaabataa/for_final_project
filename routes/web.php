<?php

use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
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
    return view('home');
});

Route::get('/student', function (){
    return view('student.student');
});

Route::get('/cbe', function (){
    return view('cbe.cbe');
});

Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');


Route::post('users/authenticate',[UserController::class, 'authenticate']);
