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
Route::get('/', function () {
    return view('welcome');
});
    //����·��
//route::group(['prefix'=>'user'],function (){
route::any('reg',['uses'=>'userController@reg']);
route::any('log',['uses'=>'userController@log']);
route::any('index',['uses'=>'userController@index']);
route::any('quit',['uses'=>'userController@quit']);
route::any('shop',['uses'=>'userController@shop']);
route::any('detail',['uses'=>'userController@detail']);
Route::resource('cart', 'cartController');



route::group(['middleware'=>'logincheck','prefix'=>'user'],function (){
    
});
route::get('pro',['uses'=>'proController@showplus']);
route::get('addcart',['uses'=>'cartController@addcart']);

route::group(['prefix'=>'admin'],function (){
route::any('test',['uses'=>'userController@test']);
Route::resource('cate', 'cateController');
Route::resource('pro', 'proController');

});


route::get('user/{id}/{name?}',function($id,$name='null'){
    return 'User-id-'.$id.'-name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

//·�ɱ���


route::group(['prefix'=>'member'],function (){
    route::get('basic1',function (){
        return 'Hello 1 from member';
    });
    route::get('user/center121',['as'=>'center',function (){
    return route('center');
}]);
});



