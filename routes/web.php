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

Route::get('/', [ProductController::class, 'getAllproduct'])->name('trangchu');

//Route::get('/search', [ProductController::class, 'search_index'])->name('index.search');
//Route::get('/filter', [ProductController::class,'getAllfilter'])->name('filter');
Route::group(
    [
        'prefix' => 'admin',
        'name' => 'admin.',

    ],
    function () {
//            Route::post('/login_success', [LoginController::class, 'login']);
//            Route::get('/login', function () {
//                return view('admin/login');
//            });
        Route::resource('product', ProductController::class);
        Route::get('search', [ProductController::class, 'search_admin'])->name('product.search');
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
        });
    }

);
//---------ADMIN----------//

////Route::get('/admin/product/delete/',[ProductController::class, 'deleteProduct'])->name('admin.delete');
