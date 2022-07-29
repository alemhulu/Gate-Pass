<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\LaravelLocalization; 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Receptionists\ReceptionistController;
use App\Http\Controllers\staffs\StaffController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitController;

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

Route::group([

    'prefix'=>LaravelLocalization::setLocale(),
     'middleware'=>['localeSessionRedirect','localizationRedirect','localeViewpath']

],function()
{

Route::group(['middleware' => 'auth'], function() {
   
    
     Route::get('/',[HomeController::class,'index'])->name('dashboard');

   

    Route::resources([
        'admin-users'  => UserController::class,

        'visit'  => VisitController::class,

    ]);

});
});