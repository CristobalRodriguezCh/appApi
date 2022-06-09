<?php

use Illuminate\Support\Facades\Route;
//use es hacer refetenia a una carpeta o un archivo 
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

Route::get('/', function () {//renderiza en este caso el achivo welcome
    return view('welcome');
});
