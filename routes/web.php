<?php

use Illuminate\Support\Facades\Auth;
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

// auth pages
Auth::routes();

// user greeting page
Route::get('/welcome', 'HomeController@welcome')->name('welcome');

// home landing page
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// about us page
Route::get('/about-us', function () {
    return view('aboutus');
})->name('about-us');

// article
Route::resource('articles', 'ArticleController')->except(['update', 'edit']);
// get article by category
Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');

// users
Route::resource('users', 'UserController')->only([
    'edit', 'update'
])->middleware(['auth', 'role:user']);

// admin can show users, delete
Route::resource('users', 'UserController')->only([
    'index', 'destroy', 'show'
])->middleware(['auth','role:admin']);