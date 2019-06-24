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


Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/', '\\' . \App\Http\Controllers\showCompaniesAction::class)->name('index');

Route::get('/about', 'showPagesAction@about')->name('about');

Route::get('/contact', 'showPagesAction@contact')->name('contact');

Route::get('/locator', function () {
    return view('locator');
})->name('locator');

Route::match(['get', 'post'], '/company/{id}', '\\' . \App\Http\Controllers\showCompanyAction::class)->name('single_company');

Route::match(['delete'], '/company-delete', '\\' . \App\Http\Controllers\deleteCompanyAction::class)->name('company_delete');

Route::post('/save_comment', '\\' . \App\Http\Controllers\saveCommentAction::class)->name('save_comment');

Route::match(['delete'], '/employee-delete', 'EmployeeAction@delete')->name('employee_delete');

Route::post('/save_employee', 'EmployeeAction@save')->name('save_employee');

Route::post('/update_employee', 'EmployeeAction@update')->name('update_employee');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


