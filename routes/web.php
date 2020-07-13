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

Route::prefix('admin')->group(function () {

    Route::get('/index', function () {
        return view('admin.layout.app');
    });

    Route::get("/country/all", "CountryController@index");
    Route::get("/country/create", "CountryController@create")->name('create_new_country');
    Route::post("/country/postcreate", "CountryController@postcreate")->name('post-create-country');


    Route::get("/country/delete/{id}", "CountryController@delete")->name('delete-country');
    Route::get("/country/update/{id}", "CountryController@Update")->name('Update-country');
    Route::post("/country/update/{id}", "CountryController@postupdate")->name('post-Update-country');

    Route::resource('city', 'CityController');
    Route::get("/city/{id}/delete", "CityController@destroy")->name('delete-city');


    Route::resource("category", "CategoryController");
    Route::get("/news/paging", "NewsController@paging");
    Route::resource("news", "NewsController");

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
