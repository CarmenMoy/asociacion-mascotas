<?php

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

Route::get('/', function () {
    return view('front.pages.home.index');
});

Route::get('/contacto', function () {
    return view('front.pages.contacto.index');
});

Route::get('/cesta', function () {
    return view('front.pages.cesta.index');
});

Route::get('/checkout', function () {
    return view('front.pages.checkout.index');
});

Route::get('/ficha', function () {
    return view('front.pages.ficha.index');
});

Route::get('/gatos', function () {
    return view('front.pages.gatos.index');
});

Route::get('/admin/usuarios', function () {
    return view('admin.pages.usuarios.index');
});