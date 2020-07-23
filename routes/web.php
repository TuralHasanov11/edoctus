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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about',  function () {
        return view('pages.about');
})->name('about');

// Doctors
Route::get('/doctors', 'DoctorsController@index');
Route::get('/doctors/{id}', 'DoctorsController@show');

// Test
Route::get('/tests', 'TestsController@index');
Route::get('/tests/{id}', 'TestsController@show');
Route::post('/tests/{id}/calculate', 'TestsController@calculate');
Route::put('/tests/{id}/calculate', 'TestsController@calculate');


// Chat 




Route::resource('news','NewsController');

Route::resource('posts','PostsController');

Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::get('/posts/{post}/comments', 'CommentsController@index');


// Chat
Route::get('/chat', function (){
    return view('chat.index');
})->middleware(['auth']);

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::get('/conversation/read/{id}', 'ContactsController@markAsRead');
Route::post('/conversation/send', 'ContactsController@send');



// Admin
Route::middleware(['auth', 'checkAdmin'])->prefix('admin')->group(function () {
    Route::get('', 'AdminController@index');
    Route::get('users', 'AdminController@users');
    
    Route::get('doctors', 'AdminController@doctors');
    Route::get('doctors/create', 'DoctorsController@create');
    Route::post('doctors', 'DoctorsController@store');
    Route::delete('doctors/{id}', 'DoctorsController@destroy');

    Route::get('tests', 'AdminController@tests');
    Route::get('tests/create', 'TestsController@create');
    Route::get('tests/{id}', 'AdminController@test');
    Route::post('tests', 'TestsController@store');
    Route::delete('tests/{id}', 'TestsController@destroy');

    Route::get('news', 'AdminController@news');
    Route::get('news/create', 'NewsController@create');

    Route::post('tests/{id}/questions', 'QuestionsController@store');
    Route::delete('questions/{id}', 'QuestionsController@destroy');
});
