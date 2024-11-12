<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DepartmentController;

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

Route::view('/admin','admin.index');
Route::prefix('admin')->group(function(){
    Route::get('categories/restore',[CategoryController::class,'restore'])->name('categories.restore');
    Route::resource('/categories',CategoryController::class);
    Route::get('departments/restore',[DepartmentController::class,'restore'])->name('departments.restore');
    Route::resource('/departments',DepartmentController::class);
    Route::get('roles/restore',[RoleController::class,'restore'])->name('roles.restore');
    Route::resource('/roles',RoleController::class);
    Route::get('teams/restore',[TeamController::class,'restore'])->name('teams.restore');
    Route::resource('/teams',TeamController::class);
    Route::get('complaints/forward/{id}',[ComplaintController::class,'forward'])->name('complaints.forward');
    Route::post('complaints/send',[ComplaintController::class,'send'])->name('complaints.send');
    Route::resource('/complaints',ComplaintController::class);
});
