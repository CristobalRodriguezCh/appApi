<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\libroController;
use App\Http\Controllers\autorController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*primero es el endpoint y depues
 la ruta del controlador el @ es 
 para referenciar al metodo */
Route::get('libros',[libroController::class,'index']);
Route::get('libros/{id}','App\Http\Controllers\libroController@show');
Route::post('libros','App\Http\Controllers\libroController@store');
Route::put('libros/{id}','App\Http\Controllers\libroController@update');
Route::delete('/libros/{id}','App\Http\Controllers\libroController@destroy');


Route::get('autores',[autorController::class,'index']);
Route::get('autor/{id}','App\Http\Controllers\autorController@show');
Route::post('autor','App\Http\Controllers\autorController@store');
