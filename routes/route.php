<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/', [
    'uses' => 'MainController@getLogin',
    'as' => 'login'
]);

Route::get('/register', [
    'uses' => 'MainController@getRegisterPage',
    'as' => 'registerPage'
]);

Route::post('/register', [
    'uses' => 'MainController@postRegistration',
    'as' => 'register'
]);

Route::post('/dologin', [
    'uses' => 'MainController@Login',
    'as' => 'UserLogin'
]);

Route::get('/logout', [
    'uses' => 'MainController@logout',
    'as' => 'logout'
]);


Route::group(['middleware' => 'auth'], function () {


    Route::get('/addclient', [
        'uses' => 'ClientController@getAddClient',
        'as' => 'addClientPage'
    ]);

    Route::post('/addclient', [
        'uses' => 'ClientController@postAddClient',
        'as' => 'AddClient'
    ]);

    Route::get('/admin/index', [
        'uses' => 'ClientController@getAdminIndex',
        'as' => 'AdminIndex'
    ]);

    Route::get('/editclient/{client_id}/edit', [
        'uses' => 'ClientController@getEditClient',
        'as' => 'EditClient'
    ]);

    Route::post('/editclient/edit', [
        'uses' => 'ClientController@postEditClient',
        'as' => 'doEditClient'
    ]);

    Route::get('/delete/{client_id}delete', [
        'uses' => 'ClientController@getDeleteClient',
        'as' => 'DeleteClient'
    ]);

    Route::get('/admin/{client_id}', [
        'uses' => 'ClientController@getClient',
        'as' => 'viewClient'
    ]);
    Route::group(['prefix' => '{client}'], function () {
        Route::get('/addservices', [
            'uses' => 'ServicesController@getAddServices',
            'as' => 'servicesPage'
        ]);

        Route::post('/addservices', [
            'uses' => 'ServicesController@postAddServices',
            'as' => 'addService'
        ]);

        Route::get('/services', [
            'uses' => 'ServicesController@getServicesPage',
            'as' => 'ServicesPage'
        ]);
        Route::get('/service/{service_id}', [
            'uses' => 'ServicesController@getEditService',
            'as' => 'EditService'
        ]);

        Route::post('/editservice', [
            'uses' => 'ServicesController@postEditServices',
            'as' => 'doEditService'
        ]);

        Route::get('/deleteservices/{service_id}', [
            'uses' => 'ServicesController@getDeleteServices',
            'as' => 'doDeleteService'
        ]);

        Route::get('/services/{client_id}', [
            'uses' => 'ServicesController@getService',
            'as' => 'viewService'
        ]);
    });
});
