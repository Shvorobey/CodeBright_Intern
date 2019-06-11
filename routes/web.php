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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', '\\' . \App\Http\Controllers\showCompaniesAction::class)->name('index');

Route::get('/about', 'showPagesAction@about')->name('about');

Route::get('/contact', 'showPagesAction@contact')->name('contact');

//Route::get('/company/{key}', '\\' . \App\Http\Controllers\showCompanyAction::class)->name('single_company');
