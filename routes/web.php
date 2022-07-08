<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Teachers\CourseController;
use \App\Http\Controllers\Students\LessonController;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [UserController::class,'register'])->name('register');


Route::group(['middleware' => 'auth'], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::get('/visits', [App\Http\Controllers\VisitController::class, 'visits'])->name('visits');
    
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::group(['prefix' => 'student', 'as' => 'student.'], function() {
        Route::resource('lessons', LessonController::class);
    });
   Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function() {
       Route::resource('courses', CourseController::class);
   });
    Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', UserController::class);
    });
});
