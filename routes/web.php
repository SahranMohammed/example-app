<?php

use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\adminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

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

//ALL FREE ACCESSSING ROUTES
Route::get('/',[IndexController::class,'loadIndexPage'])->name('load.index.page');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile',[IndexController::class,'userProfile'])->name('user.profile');
    Route::post('/user/profile/update/{id}',[IndexController::class,'userProfileUpdate'])->name('user.profile.update');
    Route::get('/change/password',[IndexController::class,'changePassword'])->name('user.changePassword');
    Route::post('/change/password',[IndexController::class,'changePasswordUpdate'])->name('user.changePassword.update');
});



//ADMIN ROUTES
Route::get('/admin',function(){
    return view('admin.adminLogin');
});
Route::prefix('/admin')->name('admin.')->group(function(){
    Route::middleware('guest:admin','PreventBackHistory')->group(function(){

        // ADMIN LOGIN
        Route::get('/login',[adminController::class,'adminPage'])->name('page');
        Route::post('/login',[adminController::class,'login'])->name('login');

    });

    Route::middleware('auth:admin')->group(function(){
        Route::view('/dashboard','admin.index')->name('dashboard');
        Route::get('/logout',[adminController::class,'logout'])->name('logout');
        Route::get('/profile',[adminProfileController::class,'adminProfilePage'])->name('profile');
        Route::post('/update/profile/{id}',[adminProfileController::class,'updateProfile'])->name('updateProfile');
        Route::post('/update/password/{id}',[adminProfileController::class,'updatePassword'])->name('updatePassword');
    });
});
