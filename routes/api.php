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



// public route can be access without login
Route::group(['prefix'=>'v1'],function (){
    /*
     |-------------------------------------------------------------------------------
     | Get All Cafes
     |-------------------------------------------------------------------------------
     | URL:            /api/v1/cafes
     | Controller:     API\CafesController@getCafes
     | Method:         GET
     | Description:    Gets all of the cafes in the application
    */
    Route::get('/cafes','API\CafesController@getCafes');
    /*
       |-------------------------------------------------------------------------------
       | Get An Individual Cafe
       |-------------------------------------------------------------------------------
       | URL:            /api/v1/cafes/{id}
       | Controller:     API\CafesController@getCafe
       | Method:         GET
       | Description:    Gets an individual cafe
      */
    Route::get('/cafe/{id}','API\CafesController@getCafe');

});

Route::group(['prefix'=>'v1','middleware'=>'auth:api'],function (){
    Route::get('/user',function (Request $request){
        return $request->user();
    });
    /*
  |-------------------------------------------------------------------------------
  | Adds a New Cafe
  |-------------------------------------------------------------------------------
  | URL:            /api/v1/cafes
  | Controller:     API\CafesController@postNewCafe
  | Method:         POST
  | Description:    Adds a new cafe to the application
 */
    Route::post('/cafes','API\CafesController@postNewCafe');

});





//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
