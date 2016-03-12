<?php
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', 'HomeController@index');

    Route::resource('accounts', 'AccountsController');
    Route::model('accounts', \App\Models\Account::class);

    Route::resource('packages', 'PackagesController');
    Route::model('packages', \App\Models\Package::class);
    Route::post('packages/packageJSON', 'PackagesController@packageJSON');

    Route::get('/server/services', 'ServerController@services');
    Route::post('/server/service', 'ServerController@serviceChange');

    Route::get('/server/updates', 'ServerController@updates');
});
