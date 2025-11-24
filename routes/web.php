<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FinanceController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Super Admin
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/roles/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('roles.superadmin.dashboard');

    // CRUD user role lain
    Route::get('/roles/superadmin/users', [SuperAdminController::class, 'index'])->name('roles.superadmin.users');
    Route::post('/roles/superadmin/users', [SuperAdminController::class, 'store']);
});

// Sales
Route::middleware(['auth', 'role:sales'])->group(function () {
    Route::get('/roles/sales/dashboard', function () {
        return view('roles.sales.dashboard');
    })->name('roles.sales.dashboard');
});


// Project
Route::middleware(['auth', 'role:project'])->group(function () {
    Route::get('/roles/project/dashboard', function () {
        return view('roles.project.dashboard');
    })->name('roles.project.dashboard');
});


// Finance
Route::middleware(['auth', 'role:finance'])->group(function () {
    Route::get('/roles/finance/dashboard', function () {
        return view('roles.finance.dashboard');
    })->name('roles.finance.dashboard');
});
