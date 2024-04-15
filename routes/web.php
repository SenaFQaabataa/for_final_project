<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;


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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/** CBE Routes Start */
// TO DO: implement => middleware(['auth', 'user-access:admin']) on all grouped routes
Route::prefix('cbe')->group(function () {
    Route::get('/home', function (){
        return view('pages.cbe.home');
    })->name('cbe.home');

    Route::prefix('/department')->group(function (){
        Route::get('/add', [DepartmentController::class, 'create'])->name('cbe.department.add');
        Route::post('/add', [DepartmentController::class, 'store'])->name('cbe.department.store');
        Route::get('/list', function (){
            return view('pages.cbe.department.list');
        })->name('cbe.department.list');
        Route::get('/view/{department}', function (){
            return view('pages.cbe.department.view');
        })->name('cbe.department.view');
        Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('cbe.department.edit');
        Route::post('/update/{department}', [DepartmentController::class, 'update'])->name('cbe.department.update');
        Route::get('/delete/{department}', [DepartmentController::class, 'destroy'])->name('cbe.department.delete');
    });
});

Route::get('/student', function (){
    return view('student.student');
});


// Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');


// Route::post('users/authenticate',[UserController::class, 'authenticate']);
