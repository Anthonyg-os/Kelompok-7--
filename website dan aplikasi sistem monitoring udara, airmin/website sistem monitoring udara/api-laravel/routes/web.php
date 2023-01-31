<?php

//jangan batasi cors
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

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
    return view('welcome');
});

//tampilkan data riwayat
Route::get('/riwayat', 'DatabaseController@riwayat');

//input data cuaca dari ajax
Route::post('/riwayat', 'DatabaseController@store');

Route::get('/tes', function () {
    echo 'muncul data tes';
});

Route::get('/tes2', function () {
    return view('tes2');
});

// Route::get('/halobro/{idx}', function($idx){
//     echo $idx;
// });
