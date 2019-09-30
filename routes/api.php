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
Route::get('ajaxdata', ['as' => 'doctor.get', 'uses' => 'DoctorController@getIndex']);
Route::get('ajaxdata/getdata', ['as' => 'ajaxdata.getdata', 'uses' => 'DoctorController@getdata']);
Route::post('ajaxdata/postdata', ['as' => 'ajaxdata.postdata', 'uses' => 'DoctorController@postdata']);
Route::get('ajaxdata/fetchdata', ['as' => 'ajaxdata.fetchdata', 'uses' => 'DoctorController@fetchdata']);
Route::get('ajaxdata/removedata', ['as' => 'ajaxdata.removedata', 'uses' => 'DoctorController@removedata']);
Route::get('ajaxdata/massremove', ['as' => 'ajaxdata.massremove', 'uses' => 'DoctorController@massremove']);