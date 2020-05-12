<?php

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
//基本路由
Route::get('/user/get','MyController@get');
Route::post('/user/post','MyController@post');
Route::put('/user/put','MyController@put');
Route::patch('/user/patch','MyController@patch');
Route::options('/user/option','MyController@option');
Route::delete('/user/delete','MyController@delete');
Route::match(['get','post'],'/user/match','MyController@match');
Route::any('/user/any','MyController@any');

//redirect
Route::get('log/here','LogController@here');
Route::get('log/there','LogController@there');
Route::redirect('log/here','/log/there');

//view 路由视图
Route::view('/view','view',['name'=>'jon']);

//路由参数
Route::get('/get/{id}/{name}',function($id,$name){
	return "UserID:".$id." Username:".$name;
});
//行内正则
Route::get('/bl/{aid}/{name}',function($aid,$name){
	return "UserID:".$aid." Username:".$name;;
})->where(['aid'=>'[0-9]+','name'=>'[a-z]+']);

//隐式绑定
Route::get('/user/{user}',function($user){
	dd($user->name);
});
Route::get('/content/{content}',function(\App\Content $content){
	return $content->title;
});

Route::get('/post','ViewController@index');
Route::post('/post/add','ViewController@add');
Route::get('/post/get/{id}','ViewController@get');
Route::post('/post/save','ViewController@save');
Route::get('/post/delete/{id}','ViewController@delete');
Route::get('/post/list','ViewController@List');