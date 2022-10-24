<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CommandController;

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
/*
Route::get('/', function () {
    return view('welcome');
});*/


/********************************************************************************************************* */
/* INDEX */

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/index/admin', [IndexController::class, 'indexadmin'])->name('index.admin');
Route::get('/index/user', [IndexController::class, 'indexuser'])->name('index.user');
Route::get('/index/vendor', [IndexController::class, 'indexvendor'])->name('index.vendor');

/********************************************************************************************************* */





/********************************************************************************************************* */

/* SHOP ROUTES */

/* GET */

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/shop/{id}', [ShopController::class, 'filter'])->name('shop.filter');

/********************************************************************************************************* */





/********************************************************************************************************* */

/**CATEGORY ROUTES */

/**CREATE  */

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

/* STORE */

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

/* SEARCH */

Route::post('/category/search', [CategoryController::class, 'search'])->name('category.search');

/* EDIT */

Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');

/* UPDATE */

Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'updates'])->name('category.update');

/**DELETE */

Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

/* ERROR */

Route::get('/category/error', [CategoryController::class, 'error'])->name('category.error');
/********************************************************************************************************* */





/********************************************************************************************************* */

/**USER ROUTES */

/**CREATE  */

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

/* STORE */

Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

/* EDIT */

Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

/* UPDATE */

Route::post('/user/update', [App\Http\Controllers\UserController::class, 'updates'])->name('user.update');

/* PASSWORD ERROR */

Route::get('/user/passworderror', [UserController::class, 'passworderror'])->name('user.passworderror');

/**DELETE */

Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

/********************************************************************************************************* */




/********************************************************************************************************* */

/**STOCK ROUTES */

/**CREATE  */

Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');

/**CREATE VENDOR */

Route::get('/stock/vendor/create', [StockController::class, 'vendorcreate'])->name('stock.vendorcreate');

/* STORE */

Route::post('/stock/store', [StockController::class, 'store'])->name('stock.store');

/* EDIT */

Route::get('/stock/edit/{id}', [App\Http\Controllers\StockController::class, 'edit'])->name('stock.edit');

/* UPDATE */

Route::post('/stock/update', [App\Http\Controllers\StockController::class, 'updates'])->name('stock.update');

/* ERROR */

Route::get('/stock/error', [StockController::class, 'error'])->name('stock.error');

/**DELETE */

Route::get('/stock/delete/{id}', [App\Http\Controllers\StockController::class, 'delete'])->name('stock.delete');
/********************************************************************************************************* */





/********************************************************************************************************* */

/* PRODUCT ROUTES*/

/* INDEX */

Route::get('/product/product', [ProductController::class, 'index'])->name('product');

/* CREATE */

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

/**CREATE VENDOR */

Route::get('/product/vendor/create', [ProductController::class, 'vendorcreate'])->name('product.vendorcreate');

/* GET ALL */

Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');

/* GET BY ID */

Route::get('/product/{id}', [ProductController::class, 'filter'])->name('product.filter');


/**DELETE */

Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');

/* STORE */

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

/* SEARCH */

Route::post('/product/search', [ProductController::class, 'search'])->name('product.search');

/* EDIT */

Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

/* UPDATE */

Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'updates'])->name('product.update');

/* ERROR */

Route::get('/product/error', [ProductController::class, 'error'])->name('product.error');

/* admin_ORDER */

Route::get('/product/admin_order', [ProductController::class, 'admin_order'])->name('product.admin_order');
/********************************************************************************************************* */







/********************************************************************************************************* */

/* CART ROUTES*/

/* INDEX */

Route::get('/cart', [CartController::class, 'index'])->name('cart');

/* GET ALL */

Route::get('/cart/list', [CartController::class, 'list'])->name('cart.list');

/* DELETE */

Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

/* EDIT */

Route::get('/cart/edit/{id}', [CartController::class, 'edit'])->name('cart.edit');

/* STORE */

Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');

/* UPDATE */

Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

/* ERROR */

Route::get('/cart/error', [CartController::class, 'error'])->name('cart.error');

/********************************************************************************************************* */







/********************************************************************************************************* */

/* CHECKOUT ROUTES */

/* INDEX */

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

/**CREATE  */

Route::get('/checkout/create', [CheckoutController::class, 'create'])->name('checkout.create');

/* STORE */

Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');

/* SUCCESS */

Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

/* ERROR */

Route::get('/checkout/error', [CheckoutController::class, 'error'])->name('checkout.error');
/********************************************************************************************************* */






/********************************************************************************************************* */

/* COMMAND ROUTES */

/* INDEX */

Route::get('/command', [CommandController::class, 'index'])->name('command');

/**CREATE  */

Route::get('/command/create', [CommandController::class, 'create'])->name('command.create');

/**CREATE VENDOR */

Route::get('/command/vendor/create', [CommandController::class, 'vendorcreate'])->name('command.vendorcreate');

/* EDIT */

Route::get('/command/edit/{id}', [App\Http\Controllers\CommandController::class, 'edit'])->name('command.edit');

/* UPDATE */

Route::post('/command/update', [App\Http\Controllers\CommandController::class, 'updates'])->name('command.update');

/* STORE */

Route::post('/command/store', [CommandController::class, 'store'])->name('command.store');

/**DELETE */

Route::get('/command/delete/{id}', [App\Http\Controllers\CommandController::class, 'delete'])->name('command.delete');


/********************************************************************************************************* */










/********************************************************************************************************* */

/* ABOUT ROUTES */

/* INDEX */

Route::get('/about', [AboutController::class, 'index'])->name('about');

/********************************************************************************************************* */






/********************************************************************************************************* */

/* BLOG ROUTES */

/* INDEX */

Route::get('/blog', [BlogController::class, 'index'])->name('blog');


/* CONTACT ROUTES */

/* INDEX */

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
/********************************************************************************************************* */




/********************************************************************************************************* */

/* CONNEXION ROUTES */

/* INDEX */

Route::get('/connexion', [ConnexionController::class, 'index'])->name('connexion');

/* STORE */

Route::post('/connexion/store', [ConnexionController::class, 'store'])->name('connexion.store');

/* ERROR */

Route::get('/connexion/error', [ConnexionController::class, 'error'])->name('connexion.error');

/* PASSWORD RESET */

Route::get('/connexion/password_reset', [ConnexionController::class, 'password_reset'])->name('connexion.password_reset');

/* PASSWORD RESET STORE */

Route::post('/connexion/password_reset_store', [ConnexionController::class, 'password_reset_store'])->name('connexion.password_reset_store');

/* EDIT */

Route::get('/connexion/edit', [App\Http\Controllers\ConnexionController::class, 'edits'])->name('connexion.edit');

/* UPDATE */

Route::post('/connexion/update', [App\Http\Controllers\ConnexionController::class, 'updates'])->name('connexion.update');

/* NOT FOUND */

Route::get('/connexion/usernotfound', [ConnexionController::class, 'usernotfound'])->name('connexion.usernotfound');

/********************************************************************************************************* */






/********************************************************************************************************* */

/* INSCRIPTION ROUTES */

/* INDEX */

Route::get('/inscription', [InscriptionController::class, 'index'])->name('inscription');

/* STORE */

Route::post('/inscription/store', [InscriptionController::class, 'store'])->name('inscription.store');

/* ERROR */

Route::get('/inscription/error', [InscriptionController::class, 'error'])->name('inscription.error');

/* EMAIL ERROR */

Route::get('/inscription/email_error', [InscriptionController::class, 'email_error'])->name('inscription.email_error');
/********************************************************************************************************* */








