<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['as'=>'', 'prefix'=>'/'], function() {
    Route::get('', [AbsensiController::class, 'index'])->name('index');
    Route::get('absen', [AbsensiController::class, 'absen'])->name('absen');
    Route::post('submit', [AbsensiController::class, 'submit'])->name('submit');


    Route::group(['as'=>'absensi.', 'prefix'=>'absensi/'], function() {
        Route::get('', [AbsensiController::class,'index'])->name('index');
        Route::get('', [AbsensiController::class,'index'])->name('index');
    });

    // ADMIN SEMUA FITUR
    Route::group(['as'=>'admin.', 'prefix'=>'admin/'], function() {
        Route::get('', [AdminController::class,'index'])->name('index');
        Route::group(['as'=>'role.','prefix'=>'role/'], function () {
            Route::get('', [RoleController::class,'index'])->name('index');
            Route::get('create', [RoleController::class,'create'])->name('create');
            Route::post('store', [RoleController::class,'store'])->name('store');
            Route::get('show/{id}', [RoleController::class,'show'])->name('show');
            Route::get('edit/{id}', [RoleController::class,'edit'])->name('edit');
            Route::post('update/{id}', [RoleController::class,'update'])->name('update');
            Route::delete('delete/{id}', [RoleController::class,'delete'])->name('delete');
        });

        Route::group(['as'=>'permission.','prefix'=>'permission/'], function () {
            Route::get('', [PermissionController::class,'index'])->name('index');
            Route::get('create', [PermissionController::class,'create'])->name('create');
            Route::post('store', [PermissionController::class,'store'])->name('store');
            Route::get('edit/{id}', [PermissionController::class,'edit'])->name('edit');
            Route::post('update/{id}', [PermissionController::class,'update'])->name('update');
            Route::delete('delete/{id}', [PermissionController::class,'delete'])->name('delete');
        });

        Route::group(['as'=>'manajemen-user.', 'prefix'=>'manajemen-user/'], function () {
            Route::get('', [UserController::class,'index'])->name('index');
            Route::get('create', [UserController::class,'create'])->name('create');
            Route::post('store', [UserController::class,'store'])->name('store');
            Route::get('edit/{id}', [UserController::class,'edit'])->name('edit');
            Route::get('show/{id}', [UserController::class,'show'])->name('show');
            Route::post('update/{id}', [UserController::class,'update'])->name('update');
            Route::delete('delete/{id}', [UserController::class,'delete'])->name('delete');
        });
    });

    Route::group(['as'=>'kegiatan.','prefix'=>'kegiatan/'], function () {
        Route::get('', [KegiatanController::class,'index'])->name('index');
        Route::get('create', [KegiatanController::class,'create'])->name('create');
        Route::post('store', [KegiatanController::class,'store'])->name('store');
        Route::get('edit/{id}', [KegiatanController::class,'edit'])->name('edit');
        Route::get('show/{id}', [KegiatanController::class,'show'])->name('show');
        Route::post('update/{id}', [KegiatanController::class,'update'])->name('update');
        Route::delete('delete/{id}', [KegiatanController::class,'delete'])->name('delete');
    });

    
});