<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\{
    StudentController,
    LessonController
};

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
    return redirect()->route('home');
});

Auth::routes(['register' => false]);

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/manage/students', [StudentController::class, 'index'])->name('student');

    // Route Admin
    Route::prefix('admin')->group(function () {
        // Students
        Route::get('/list/students', [StudentController::class, 'getList']);
        Route::post('/student/store', [StudentController::class, 'store']);

        // Lessons
        Route::get('/list/lessons', [LessonController::class, 'getList']);
    });
});