<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/{id}', 'CustomerController@show');
Route::get('/customers/search/{name}', 'CustomerController@search');

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');



//  Protected routes 
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/logout', 'AuthController@logout'); 

    Route::post('/customers', 'CustomerController@store');
    Route::put('/customers/{id}', 'CustomerController@update');
    Route::delete('/customers/{id}', 'CustomerController@destroy');
});