<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/sai');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view/employees', [EmployeController::class, 'index'])->name('employees.index');
Route::get('/employees', [EmployeController::class, 'store'])->name('employees.store');
Route::get('/employees/list', [EmployeController::class, 'list'])->name('employees.list');
Route::post('/employees', [EmployeController::class, 'create'])->name('employees.create');
