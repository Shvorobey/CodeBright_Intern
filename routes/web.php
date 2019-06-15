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

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', '\\' . \App\Http\Controllers\showCompaniesAction::class)->name('index');

Route::get('/about', 'showPagesAction@about')->name('about');

Route::get('/contact', 'showPagesAction@contact')->name('contact');

Route::get('/locator', function () {
    return view('locator');
})->name('locator');

Route::match(['get', 'post'],'/company/{id}', '\\' . \App\Http\Controllers\showCompanyAction::class)->name('single_company');

