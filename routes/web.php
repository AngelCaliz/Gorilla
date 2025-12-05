<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;


/*
|--------------------------------------------------------------------------
| 1. RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'))->name('inicio');

Route::view('/productos', 'tienda.index')->name('tienda.index');
Route::view('/servicios', 'tienda.servicios')->name('servicios');
Route::view('/contacto', 'contacto')->name('contacto');


/*
|--------------------------------------------------------------------------
| 2. AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

Route::controller(LoginController::class)->group(function () {

    // Formularios
    Route::get('/login', 'showLoginForm')->name('login');
    Route::get('/register', 'showRegisterForm')->name('register');

    // Procesos
    Route::post('/login', 'procesar')->name('login.procesar');
    Route::post('/register', 'register')->name('register.procesar');

    // Logout
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});


/*
|--------------------------------------------------------------------------
| 3. CARRITO (PÚBLICO)
|--------------------------------------------------------------------------
*/

Route::controller(CarritoController::class)
    ->prefix('carrito')
    ->name('carrito.')
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::post('/agregar/{id}', 'agregar')->name('agregar');
        Route::post('/eliminar/{id}', 'eliminar')->name('eliminar');
        Route::post('/vaciar', 'vaciar')->name('vaciar');
    });


/*
|--------------------------------------------------------------------------
| 4. PEDIDOS (PÚBLICO)
|--------------------------------------------------------------------------
*/

Route::get('/adquirir/{producto}', function ($producto) {
    return view('pedidos.confirmar', [
        'producto' => urldecode($producto)
    ]);
})->name('pedidos.confirmar');

Route::post('/pedido/guardar', [PedidoController::class, 'store'])->name('pedido.store');

Route::get('/pedido-confirmado', fn() => view('pedidos.ok'))->name('pedidos.ok');


/*
|--------------------------------------------------------------------------
| 5. ZONA PROTEGIDA (AUTH)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PERFIL DE USUARIO
    |--------------------------------------------------------------------------
    */
    Route::controller(PerfilController::class)
        ->prefix('perfil')
        ->name('perfil.')
        ->group(function () {

            Route::get('/', 'index')->name('index');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/update', 'update')->name('update');
        });


    /*
    |--------------------------------------------------------------------------
    | ADMINISTRACIÓN
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | SOLO ADMIN
        |--------------------------------------------------------------------------
        */
        Route::middleware('role:admin')->group(function () {

            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

            // ADMIN gestiona TRABAJADORES
            Route::resource('trabajadores', TrabajadorController::class)->parameters([
                'trabajadores' => 'trabajador'
            ]);

            // ADMIN gestiona CLIENTES
            Route::resource('clientes', ClienteController::class);

            // ADMIN gestiona CATEGORÍAS (opcional)
            Route::resource('categorias', CategoriaController::class);
        });


        /*
        |--------------------------------------------------------------------------
        | SOLO TRABAJADOR
        |--------------------------------------------------------------------------
        */
        Route::middleware('role:trabajador')->group(function () {

            // TRABAJADOR gestiona PRODUCTOS
            Route::resource('productos', ProductoController::class);
        });
    });
});
