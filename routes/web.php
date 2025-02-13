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

Route::group(['prefix' => 'admin'], function () {

    /*
    Dentro de resouruce( 'usuarios') "usuarios" significa lo que tendremos que escribir en la url para entrar en la página, 
    en este caso tendremos que escribir www.dev-asociacion-mascotas.com/admin/usuarios

    Tendremos que decir también que controlador queremos cargar, en este caso el controlador que estamos cargando se llama
    "UserController" y se encuentra dentro de la carpeta /app/http/controllers/admin
    
    En Internet una web es enviada desde el servidor al usuario a través de un protocolo llamado 
    HTTP/S. La información enviada a través de este protocolo llega a los puertos 80 (no-seguro) o al 443 (seguro). Cuando instalamos
    en el servidor un programa para convertirlo en un servidor web (por ejemplo, Nginx o Apache) estos se van a responsabilizar de
    gestionar esos puertos para detectar si hay llamadas o hay que hacer envios de datos. 

    Las llamadas que hacemos por HTTP tiene principalmente 4 métodos (verbos) que son:

    - GET: Esto significa que hacemos una llamada que va a pedir datos al servidor. 
    - POST: Esto significa que hacemos una llamada que va a enviar datos al servidor.
    - PUT: Esto signifca que hacemos una llamada que va a actualizar datos en el servidor.
    - DELETE: Esto significa que hacemos una llamada que va a eliminar datos en el servidor. 

    Estos métodos HTTP se corresponden con los métodos que vamos a tener en el controlador:

    - index, create, edit show  serán llamadas de tipo GET
        -- En index pediremos todos los datos de una tabla de la base de datos
        -- En create pediremos que nos limpie el formulario.
        -- En edit o show pediremos que nos pase sólo un registro de la tabla (por una id)
    - store será una llamada de tipo POST
        -- En store guardaremos los datos que hayamos añadido en el formulario, nos servirá tanto para guardar datos nuevos como actualizarlos
    - destroy será una llamada de tipo DELETE
        -- En destroy lo que haremos es borrar un dato de la base de datos 
    */

    Route::resource('usuarios', 'App\Http\Controllers\Admin\UserController', [
        'parameters' => [
            'usuarios' => 'user', 
        ],
        'names' => [
            'index' => 'users',
            'create' => 'users_create',
            'edit' => 'users_edit',
            'store' => 'users_store',
            'destroy' => 'users_destroy',
            'show' => 'users_show',
        ]
    ]);

    Route::resource('faqs', 'App\Http\Controllers\Admin\FaqController', [
        'parameters' => [
            'faqs' => 'faq', 
        ],
        'names' => [
            'index' => 'faqs',
            'create' => 'faqs_create',
            'edit' => 'faqs_edit',
            'store' => 'faqs_store',
            'destroy' => 'faqs_destroy',
            'show' => 'faqs_show',
        ]
    ]);

    
    Route::resource('cats', 'App\Http\Controllers\Admin\CatController', [
        'parameters' => [
            'cats' => 'cat', 
        ],
        'names' => [
            'index' => 'cats',
            'create' => 'cats_create',
            'edit' => 'cats_edit',
            'store' => 'cats_store',
            'destroy' => 'cats_destroy',
            'show' => 'cats_show',
        ]
    ]);

    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController', [
        'parameters' => [
            'categories' => 'category', 
        ],
        'names' => [
            'index' => 'categories',
            'create' => 'categories_create',
            'edit' => 'categories_edit',
            'store' => 'categories_store',
            'destroy' => 'categories_destroy',
            'show' => 'categories_show',
        ]
    ]);

    Route::resource('customers', 'App\Http\Controllers\Admin\CustomerController', [
        'parameters' => [
            'customers' => 'customer', 
        ],
        'names' => [
            'index' => 'customers',
            'create' => 'customers_create',
            'edit' => 'customers_edit',
            'store' => 'customers_store',
            'destroy' => 'customers_destroy',
            'show' => 'customers_show',
        ]
    ]);
});

Route::get('/', function () {
    return view('front.pages.home.index');
});

Route::get('contacto', 'App\Http\Controllers\Front\ContactController@index')->name('contact_front');
Route::post('contacto', 'App\Http\Controllers\Front\ContactController@store')->name('contact_form_front');
Route::get('contacto', 'App\Http\Controllers\Front\BusinessInformationController@index')->name('businessInformation_front');


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

