<?php

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
use App\User;
Route::get('/', function () {
    return view('index');
});
Route::group(['middleware'=>'AdminCheck'],function()
{
    Route::get('sticks','StickController@manage');
    Route::resource('stick','StickController');
});



Auth::routes();

Route::post('getsticks','StickController@all');

Route::get('/all','HomeController@allStick');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setrelation','RelationController@setUserRelation');
Route::post('/setrelation','RelationController@setUserGuardianRelation');
Route::get('setinfo',function()
{
   return view('auth.detailInfo');
});
Route::post('setinfo','HomeController@setInfo');
Route::post("detachrelation",'RelationController@detachRelation');
Route::group(['middleware'=>'LoginCheck'],function ()
{
    Route::get('unlock/{id}','StickUseController@unlock');
    Route::post('unlock','StickUseController@postUnlock');
    Route::get('lock','StickUseController@lock');
    Route::post('lock','StickUseController@postLock');
});


