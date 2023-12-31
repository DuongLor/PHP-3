<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
	Route::middleware('authAdmin')->group(function () {
		Route::get('/student', [StudentController::class, 'index'])->name('student');
		Route::match(['get', 'post'], '/student/create', [StudentController::class, 'store'])->name('route_student_create');
		Route::get('/student/edit/{studentId}', [StudentController::class, 'edit'])->name('student.edit');
		Route::put('/student/update/{studentId}', [StudentController::class, 'update'])->name('student.update');
		Route::get('/student/delete/{studentId}', [StudentController::class, 'delete'])->name('student.delete');
	});
});
// Route::get('/student/create',[StudentController::class,'create'])->name('student.create');
// Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
