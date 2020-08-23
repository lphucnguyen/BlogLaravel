<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', 'WelcomeController@home')->name("welcome");
Route::get('/post/{slug}_{id}', 'WelcomeController@post')->name('post');
Route::get('/tag/{slug}', 'WelcomeController@tag')->name('tag');
Route::post('/comment/{id}', 'WelcomeController@comment')->name('comment');
Route::get('/category/{slug}_{id}', 'WelcomeController@category')->name('category');
Route::post('/subscriber', 'WelcomeController@subscriber')->name('subscriber');
Route::get('/search', 'WelcomeController@search')->name('search');

Auth::routes();

Route::get('/phpinfo', function () {
    return gd_info();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return redirect()->route('admin.dashboard');
});

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');


Route::group(['prefix' => '/admin', 'name' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard',"DashboardController@index")->name("admin.dashboard");
    Route::resource('/category', 'CategoryController');
    
    Route::get('/category/{id}/publish', 'CategoryController@published')->name('category.published');
    Route::resource('/post', 'PostController');
    
    Route::get('/post/{id}/publish', 'PostController@published')->name('post.published');
    Route::resource('/tag', 'TagController');
    
    Route::resource('/slider', 'SliderController');
    Route::get('/slider/{id}/publish', 'SliderController@published')->name('slider.published');
    
    Route::resource('/subscriber', 'SubscriberController');

    Route::resource('/comment', 'CommentController');

    Route::resource('/menu', 'MenuController');

    Route::resource('/contact', 'ContactController');

    Route::get('clear', function () {
        Artisan::call("cache:clear");
        Artisan::call("config:clear");
        Artisan::call("config:cache");
        Artisan::call("route:clear");
    });
});

Route::group(['prefix' => '/author', 'namespace' => 'author', 'middleware' => ['auth', 'author']], function () {
    Route::get('/dashboard')->name("author.dashboard");
});

Route::any('/ckfinder/connector', 'CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', 'CKFinderController@browserAction')
    ->name('ckfinder_browser');