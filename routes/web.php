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

Route::get('/', 'PublicController@index')->name('index');
Route::get('post/{post}','PublicController@singlePost')->name('singlePost');
Route::get('about','PublicController@about')->name('about');

Route::get('contact','PublicController@contact')->name('contact');
Route::Post('contact','PublicController@contactPost')->name('contactPost');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//User Route

Route::prefix('user')->group(function (){
    Route::get('dashboard','UserController@dashboard')->name('userDashboard');
    Route::get('comments','UserController@comments')->name('userComments');
    Route::post('comment/{comment}/delete','UserController@deletecomment')->name('deleteComment');
    Route::get('profile','UserController@profile')->name('userProfile');
    Route::post('profile','UserController@profilePost')->name('userProfilePost');
});

//Author Route

Route::prefix('author')->group(function (){
    Route::get('dashboard','AuthorController@dashboard')->name('authorDashboard');
    Route::get('posts','AuthorController@posts')->name('authorPosts');
    Route::get('posts/new','AuthorController@newpost')->name('newPost');
    Route::post('posts/new','AuthorController@createpost')->name('createPost');
    Route::get('post/{post}/edit','AuthorController@postedit')->name('postEdit');
    Route::post('post/{post}/edit','AuthorController@updatepost')->name('updatePost');
    Route::post('post/{post}/delete','AuthorController@deletepost')->name('deletePost');
    Route::get('comments','AuthorController@comments')->name('authorComments');
});

//Admin Route
Route::prefix('admin')->group(function (){
    Route::get('dashboard','AdminController@dashboard')->name('adminDashboard');
    Route::get('posts','AdminController@posts')->name('adminPosts');
    Route::get('post/{post}/edit','AuthorController@postedit')->name('adminPostEdit');
    Route::post('post/{post}/edit','AuthorController@updatepost')->name('adminUpdatePost');
    Route::post('post/{post}/delete','AuthorController@deletepost')->name('adminDeletePost');
    Route::get('comments','AdminController@comments')->name('adminComments');
    Route::post('comment/{comment}/delete','AdminController@deletecomment')->name('deleteComment');
    Route::get('users','AdminController@users')->name('adminUsers');
    Route::get('user/{user}/edit','AdminController@edituser')->name('adminEditUser');
    Route::post('user/{user}/edit','AdminController@edituserpost')->name('adminEditUserPost');
    Route::post('user/{user}/delete','AdminController@deleteuser')->name('adminDeleteUser');
});
