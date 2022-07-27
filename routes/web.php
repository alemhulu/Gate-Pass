<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Receptionists\ReceptionistController;
use App\Http\Controllers\staffs\StaffController;
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
    // Route::group(['prefix' => 'receptionists', 'as' => 'receptionists.'], function() {
    //     Route::resource('receptionist', ReceptionistController::class);
    // });
//    Route::group(['prefix' => 'staffs', 'as' => 'staffs.'], function() {
//        Route::resource('staff', StaffController::class);
//    });
    // Route::group([ 'prefix' => 'admin', 'as' => 'admin.'], function() {
    //     Route::resource('users', UserController::class);
    // });
     Route::get('/',[HomeController::class,'index'])->name('dashboard');

     
    // Route::get('/admin/users/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('dedtroy');

    // Route::post('/visit/view', [App\Http\Controllers\HomeController::class, 'view'])->name('view');

    // Route::post('/visit/viewcode', [App\Http\Controllers\ViewCodeController::class, 'viewcode'])->name('viewcode');

    // Route::get('/visits', [App\Http\Controllers\VisitController::class, 'visits'])->name('visits');

    

    // Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');

    // Route::post('/admin/user/store', [UserController::class, 'store'])->name('store');

    // Route::post('/admin/user/edit', [UserController::class, 'update'])->name('edit');

    // Route::delete('/admin/user/{id}', UserController@destroy)->name("user-delete" );

    Route::resources([
        'admin.users'  => UserController::class,

        
    ]);

    // Route::get('changeStatus', [App\Http\Controllers\HomeController::class, 'changeStatus'])->name('changeStatus');
});
