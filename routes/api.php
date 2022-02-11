<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

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
Route::get('photo', 'App\http\Controllers\ItemsController@index');
Route::post('st',	 'App\Http\Controllers\ItemsController@store');

Route::get('show/{id}', function ($id)
{
	$link = Items::find($id);
	return Response::json($link);
});

Route::post('update/{id}', 'App\Http\Controllers\ItemsController@update');
Route::post('store_image/delete/{id}', 'App\Http\Controllers\ItemsController@destroy');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
