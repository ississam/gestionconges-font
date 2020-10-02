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

// Route::post('login', 'API\UserController@login');
// Route::post('register', 'API\UserController@register');
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details', 'API\UserController@details');
        Route::get('/employes','EmployesController@index');
// Route::get('/employes/{id}','EmployesController@index');
Route ::get('/employes/{id}/modif','EmployesController@show');
Route ::get('/employes/total','EmployesController@total');
        // Route ::get('/employes/mod','EmployesController@show');
Route ::post('/employes/nouveau','EmployesController@store');
// Route ::put('/employes/{matricule}/modifier','EmployesController@update');
Route ::delete('/employes/{id}/delete','EmployesController@destroy');


// /employes/${id}/modif
// Route::resources([
//     'typeconges' => 'TypecongeController',
// ]);

Route::get('/services', 'ServicesController@index');//->middleware('responsable');
// Route ::post('/services/nouveau','ServicesController@store') ;
// Route ::put('/services/{id}/modifier','ServicesController@update') ;

// Route ::post('/typeconge/nouveau','TypecongeController@store') ;
Route ::get('/typeconge/liste','TypecongeController@index');//->middleware('responsable');
Route ::post('/conge/nouveau','CongesController@store');//->middleware('responsable');
Route ::get('/conge/listeconge','CongesController@filtrer');//->middleware('responsable');
Route ::put('/conge/modif/{id}','CongesController@update');// ->middleware('responsable');

///////Voyager/////
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route ::get('employes/phot','EmployesController@photo');
    Route ::get('/conge/liste','CongesController@index');
    Route::get('details', 'API\UserController@details')->middleware('responsable');

// Route::get('details', 'API\UserController@details')->middleware('responsable');
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
