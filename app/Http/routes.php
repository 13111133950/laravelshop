<?php

use Psy\Command\WhereamiCommand;
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
//·���������ͼ

Route::any('/',['uses'=>'userController@index']);
    //����·��
//route::group(['prefix'=>'user'],function (){
route::any('reg',['uses'=>'userController@reg']);

route::any('index',['uses'=>'userController@index']);
route::any('quit',['uses'=>'userController@quit']);
route::any('shop',['uses'=>'userController@shop']);
route::any('detail',['uses'=>'userController@detail']);
Route::resource('cart', 'cartController');

route::group(['middleware'=>'src'],function (){
    route::any('log',['uses'=>'userController@log']);
});
route::group(['middleware'=>'logincheck'],function (){
    route::get('addcart',['uses'=>'cartController@addcart']);
});
route::get('pro',['uses'=>'proController@showplus']);


route::group(['prefix'=>'admin'],function (){
route::any('test',['uses'=>'userController@test']);
Route::resource('cate', 'cateController');
Route::resource('pro', 'proController');

});


route::get('user/{id}/{name?}',function($id,$name='null'){
    return 'User-id-'.$id.'-name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);





