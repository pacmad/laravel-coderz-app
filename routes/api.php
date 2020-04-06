<?php

use Illuminate\Http\Request;

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

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout') -> middleware('auth:api');
Route::post('/register', 'AuthController@register');

Route::post('/graph', 'StatisticsController@search');

Route::get('/tickets', 'TicketController@index');
Route::get('/tickets/{id}', 'TicketController@show');
Route::post('/tickets', 'TicketController@store');
Route::get('/tickets/user/{id}', 'TicketController@showUserTickets');

Route::get('tickets/{id}/notes', 'NoteController@index');
Route::post('tickets/{id}/notes', 'NoteController@store');
