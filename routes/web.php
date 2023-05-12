<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\LoginController;
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

Route::group(
    [
        'prefix' => 'admin',
        'name' => 'admin.',
    ],
    function () {
        Route::middleware(['guest'])->group(function () {
            Route::post('/register', [LoginController::class, 'register']);
            Route::get('/register', function () {
                return view('admin/register');
            })->name('register');
            Route::post('/login', [LoginController::class, 'login'])->name('login');
            Route::get('/login', function () {
                return view('admin/login');
            });
        });

        Route::middleware(['auth'])->group(function () {
            Route::post('/logout',[LoginController::class, 'logout'])->name('logout_success');
            Route::resource('product', ProductController::class);
            Route::get('search', [ProductController::class, 'search_admin'])->name('product.search');
            Route::get('/', [ProductController::class, 'getAllproduct'])->name('trangchu');
        });
    }
);
