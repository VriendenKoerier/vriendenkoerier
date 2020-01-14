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

use Illuminate\Http\Request;


// Route::get('/edit/{package}', 'PackageController@SignedURL')->name('edit');

// //short version
// Route::resource('/package', 'PackageController');

//long version
// Route::get('/projects', 'PagesController@index');
// Route::get('/projects/create', "PagesController@create");
// Route::post('/projects/create', "PagesController@store");
// Route::get('/projects/{project}', "PagesController@show");
// Route::get('/projects/{project}/edit', "PagesController@edit");
// Route::patch('/projects/{project}', "PagesController@update");
// Route::delete('/projects/{project}', "PagesController@destroy");

Route::get('/', function () {
    return view('homePage');
});

// Route::get('/', function () {
//     return view('homePage');
// });

// Route::get('/show', function () {
//     return view('show');
// });

// Route::get('/test', function () {
//     return view('homePage');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
