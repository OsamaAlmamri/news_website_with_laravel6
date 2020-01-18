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

Route::get('/admin/login', function () {
    return view('login');
})->name('admin.login');

Route::post('/admin/login', 'Auth\LoginController@login')->name('admin.attempt');
Route::post('/user/login', 'Auth\LoginController@login')->name('user.attempt');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::fallback('website\Pages@view');


Route::group(['middleware' => 'Maintenance'], function () {

});


Route::get('/home', "HomeController@home")->name('home');
Route::get('/setup', "HomeController@setup")->name('setup');
Route::get('/pages/{id}', "HomeController@pages")->name('pages');
Route::get('/login', "HomeController@login")->name('login');
Route::get('/signUp', "HomeController@singUp")->name('singUp');
Route::post('/login', 'Admin\usersController@login')->name('user.attempt');


Route::get('/', "HomeController@home");

Route::get('/student', function () {
    return view('style.student');
});

Route::get('/newstype/{type}', "HomeController@viewslider");
Route::get('/news', "HomeController@viewallnews");

Route::get('/moreDetials/{id}', "HomeController@showmoredetials");
Route::get('/department/{id}', "HomeController@showdepartment");

Route::get('/department{id}', function () {
    return view('style.department');
});



Route::get('/about','HomeController@test') ;


