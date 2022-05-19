<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CartController;

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

Route::get('/login', [SessionController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::get('/register', [RegistroController::class, 'create'])
    ->name('register.index');

Route::post('/register', [RegistroController::class, 'store'])
    ->name('register.store');

Route::post('/login', [SessionController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionController::class, 'destroy'])
    ->name('login.destroy');

Route::get('/details', [SessionController::class, 'show'])
    ->name('login.show');

Route::get('/editUser', [SessionController::class, 'edit'])
    ->name('login.edit');

Route::put('/applySettings/{id}', [SessionController::class, 'applySetting'])
    ->name('login.applySetting');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::resource('/userList', userController::class);

Route::get('/search', [userController::class, 'search'])
    ->name('userList.search');

Route::resource('/products', productController::class);

Route::get('/searchProducts', [productController::class, 'search'])
    ->name('products.search');

Route::resource('/categories', categoryController::class);

Route::get('/searchCat', [categoryController::class, 'search'])
    ->name('categories.search');

Route::get('/cart', [CartController::class, 'showProducts'])
    ->name('cart.index');

Route::post('/addProduct', [CartController::class, 'addProducts'])
    ->name('cart.addProducts');

Route::get('/checkout', [CartController::class, 'checkoutList'])
    ->name('cart.checkout');

Route::get('/deleteItem/{id}',[CartController::class, 'destroy']);

Route::get('/clear',[CartController::class, 'clearList']);

Route::get('/buy',[CartController::class, 'confirmPurchase']);