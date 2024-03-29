<?php

use App\Http\Controllers\CheckinCheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\SearchController;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function(){
    Route::get('/',[HomeController::class,'index'])->name('dashboard');
    Route::resources([
        'users'  => UserController::class,
        'visits'  => VisitController::class,
        'roles' => RoleController::class,   
        'check-in-out'=>CheckinCheckoutController::class,  
        'Approve'=>ApproveController::class,     
        'purpose'=>PurposeController::class,     
         'search'=>SearchController::class
    ]);
});
