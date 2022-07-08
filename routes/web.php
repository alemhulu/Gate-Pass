<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Teachers\CourseController;
use App\Http\Controllers\Students\LessonController;
use App\Http\Controllers\HomeController;


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


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'student', 'as' => 'student.'], function() {
        Route::resource('lessons', LessonController::class);
    });
   Route::group(['prefix' => 'teacher', 'as' => 'teacher.'], function() {
       Route::resource('courses', CourseController::class);
   });
    Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', UserController::class);
    });
    Route::get('/',[HomeController::class,'index'])->name('dashboard');
    Route::post('/visit/view', [App\Http\Controllers\HomeController::class, 'view'])->name('view');

    Route::post('/visit/viewcode', [App\Http\Controllers\ViewCodeController::class, 'viewcode'])->name('viewcode');

    Route::get('/visits', [App\Http\Controllers\VisitController::class, 'visits'])->name('visits');

    Route::get('/visit/create', [App\Http\Controllers\VisitController::class, 'create'])->name('visit.create');

    Route::post('/visit/store', [App\Http\Controllers\VisitController::class, 'store'])->name('store');

    Route::post('/visit/edit', [App\Http\Controllers\VisitController::class, 'edit'])->name('edit');

    Route::get('/visit/delete/{id}', [App\Http\Controllers\VisitController::class, 'delete'])->name('delete');

    Route::get('changeStatus', [App\Http\Controllers\HomeController::class, 'changeStatus'])->name('changeStatus');
});
