<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\User\UserProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'],function ()
{
    Route::get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');
    Route::get('user/profile',[UserProfileController::class,'index'])->name('profile');
});

Route::group(['middleware'=>'isAdmin'],function ()
{
    Route::get('admin/dashboard',[AdminUserController::class,'index'])->name('admin.dashboard');
    Route::get('admin/edit-profile/{id}',[AdminUserController::class,'edit'])->name('edit.profile');
});

require __DIR__.'/auth.php';
