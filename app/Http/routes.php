<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('index',[1]);
});

Route::get('/profile',function(Request $request){
   return redirect()->route('post.index');
  }
);


// Authentication Routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration Routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
 

Route::get('post/index/{page}',['uses'=>'PostController@indexnew' ,'as'=>'index']);
Route::get('post/comCreate/{id}',['uses'=>'PostController@comCreate','as'=>'comCreate']);
Route::get('post/comStore/{id}',['uses'=>'PostController@comStore','as'=>'comStore']);
Route::get('post/comDestroy/{shuju_id}/{id}',['uses'=>'PostController@comDestroy','as'=>'comDestroy']);
Route::get('post/wenStore',['uses'=>'PostController@wenStore','as'=>'wenStore']);

Route::resource('post','PostController');



//ROute::get('/control/{id?}',function(){
  //return view('control');
//});
//Route::get('/del',function(){
  //return view('del');
//});
//Route::get('/newshow/{id?}',function(){
//  return view ('newshow');
//});