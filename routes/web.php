<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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
/** CBE Routes End */

/** Department Route Start */
Route::middleware(['auth', 'user-access:department'])->group(function () {
    Route::prefix('/department')->group(function (){
        Route::get('/home', [DashboardController::class, 'departmentIndex'])->name('department.home');

        Route::get('/student/list', [DepartmentController::class, 'studentIndex'])->name('department.student.index');
        Route::get('/student/add', [DepartmentController::class, 'studentCreate'])->name('department.student.add');
        Route::get('/student/edit/{id}', [DepartmentController::class, 'studentEdit'])->name('department.student.edit');
        Route::post('/student/update', [DepartmentController::class, 'studentUpdate'])->name('department.student.update');
        Route::post('/student/destroy/{id}', [DepartmentController::class, 'studentDestroy'])->name('department.student.destroy');
        Route::post('/student/store', [DepartmentController::class, 'studentStore'])->name('department.student.store');
        Route::get('/student/download/{file}', [DepartmentController::class, 'studentListDownload'])->name('department.download.studentlist');

    });
});
/** Department Route End */

/** Supervisor Route Start */
Route::middleware(['auth', 'user-access:supervisor'])->group(function () {
    Route::prefix('/supervisor')->group(function (){
        Route::get('/home', [DashboardController::class, 'supervisorIndex'])->name('supervisor.home');
    });
});
/** Supervisor Route End */

/** Institution Route Start */
Route::middleware(['auth', 'user-access:institution'])->group(function () {
    Route::prefix('/institution')->group(function (){
        Route::get('/home', [DashboardController::class, 'institutionIndex'])->name('institution.home');
    });
});
/** Institution Route End */

/** Student Route Start */
Route::middleware(['auth', 'user-access:student'])->group(function () {
    Route::prefix('/student')->group(function (){
        Route::get('/home', [DashboardController::class, 'studentIndex'])->name('student.home');
    });
});
/** Student Route End */
