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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::get('/key-management', 'HomeController@keym')->name('home.keym');
    Route::get('/search', 'HomeController@search')->name('home.search');
    Route::post('/search', 'HomeController@search')->name('home.post');

    // Key route
    Route::get('/get-key', 'keysController@keyGen')->name('key.gen');
    Route::get('/single-keygen', 'keysController@genView')->name('key.formView');
    Route::get('/batch-keygen', 'keysController@batchGenView')->name('key.batchGen');
    Route::post('/keygen', 'keysController@savekey')->name('key.submitForm');
    Route::post('/batch-keygen', 'keysController@batchSavekey')->name('key.batchSubmitForm');
    Route::post('/edit-key', 'keysController@editKey')->name('key.edit');
    Route::post('/save-key', 'keysController@updateKey')->name('key.save');

    Route::group(['middleware' => ['guest']], function() {
        // /**
        //  * Register Routes
        //  */
        // Route::get('/register', 'RegisterController@show')->name('register.show');
        // Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/', 'LoginController@show')->name('login.show');
        Route::post('/', 'LoginController@login')->name('login.perform');


    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
