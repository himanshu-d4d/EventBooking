<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
Route::get('/admin', [AdminController::class, 'login'])->name('login');
Route::post('admin/login', [AdminController::class, 'adminlogin']);


Route::group(['middleware' => 'auth:admin'], function (){
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard.index');
        })->name('dashboard');
        Route::get('/logout', [AdminController::class, 'logout']);
        Route::get('/profile', [AdminController::class, 'AdminProfile']);
        Route::get('/profile/{id}', [AdminController::class, 'Profile']);
        Route::post('/editprofile', [AdminController::class, 'EditProfile']);
        Route::get('/image', [AdminController::class, 'AdminImage'])->name('edit_image');
        Route::post('/edit-image', [AdminController::class, 'editAdminImage']);
        Route::get('/reset-password', [AdminController::class, 'ResetPassword']);
        Route::post('/reset-admin-password', [AdminController::class, 'ResetAdminPassword']);




    });
});

    
    
/////////////////// Dashboard Route //////////////////////////////

//Route::get('/admin', [EventController::class, 'EventCreate']);
