<?php

use Illuminate\Support\Facades\Route;


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



//LOGIN Y REGISTRO
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/logout', [Logoutcontroller::class, 'destroy'])
    ->middleware('auth')->name('logout');

Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.autenticar');



use App\Http\Controllers\VideojuegoController;
//Con el método estático resource() de la clase Route creas múltiples rutas para las diferentes acciones/métodos del recurso

//INDICE
Route::get('/', [VideojuegoController::class, 'index'])->name("/");
Route::get('/videojuegos/about', [VideojuegoController::class, 'about'])->name('videojuegos.about');
Route::get('/videojuegos/contacto', [VideojuegoController::class, 'contacto'])->name('videojuegos.contacto');
Route::get('/videojuegos/admin', [VideojuegoController::class, 'admin'])->name('videojuegos.admin');

//Route::resource('videojuegos', VideojuegoController::class);

Route::get('/videojuegos', [VideojuegoController::class, 'index'])
->name('videojuegos.index');

Route::get('/videojuegos/create',[VideojuegoController::class, 'create'])->name('videojuegos.create');
Route::post('/videojuegos',[VideojuegoController::class, 'store'])->name('videojuegos.store');
Route::get('/videojuegos/{videojuego}',[VideojuegoController::class, 'show'])->name('videojuegos.show');
Route::get('/videojuegos/{videojuego}/edit',[VideojuegoController::class, 'edit'])->name('videojuegos.edit');

Route::put('/videojuegos/{videojuego}',[VideojuegoController::class, 'update'])->name('videojuegos.update');
Route::delete('/videojuegos/{videojuego}',[VideojuegoController::class, 'destroy'])->name('videojuegos.destroy');


//Carrito de compras
use App\Http\Controllers\CartController;

Route::get('/', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');



