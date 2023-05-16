<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//    Route::post('/register', [LoginController::class, 'register']);
//    Route::get('/register', function () {
//        return view('admin/register');
//    })->name('register');
//    Route::post('/login', [LoginController::class, 'login'])->name('login_success');
//    Route::get('/login', function () {
//        return view('admin/login');
//    })->name('login');
//
//Route::middleware(['auth'])->group(function () {
//    Route::post('/logout',[LoginController::class, 'logout'])->name('logout_success');
////    Route::get('/', [ProductController::class, 'getAllproduct'])->name('trangchu');
//});
