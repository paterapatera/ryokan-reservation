<?php

use \App\Http\Controllers\Web;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // 従業員管理
    Route::get('/employees', Web\EmployeeMgr\List\Controller::class)->name('employees.list');
    Route::get('/employees/create', [Web\EmployeeMgr\Create\Controller::class, 'create'])->name('employees.create');
    Route::post('/employees', [Web\EmployeeMgr\Create\Controller::class, 'store'])->name('employees.store');
});