<?php

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

Route::get('/admin/projects/create',[App\Http\Controllers\AdminProjectsController::class, 'create'])->name('admin.projects.create');
Route::post('/admin/projects/store', [App\Http\Controllers\AdminProjectsController::class, 'store'])->name('admin.projects.store');
Route::get('/admin/projects/index',[App\Http\Controllers\AdminProjectsController::class, 'index'])->name('admin.projects.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
