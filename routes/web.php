<?php
use Illuminate\Support\Facades\Route;
 
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
// })->name('dashboard');
Route::get('/admin', 'MainController@index');
Route::get('/', 'MainController@index');
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
	//Class
	Route::resource('/class', 'ClassNameController');
	Route::post('/class/store', 'ClassNameController@store');
    Route::get('/class/show/{id}', 'ClassNameController@show');
    Route::post('/class/update','ClassNameController@update');

	Route::resource('/section', 'SectionNameController');
	Route::get('/section/show/{id}', 'SectionNameController@show');
	Route::post('/section/store', 'SectionNameController@store');

	Route::resource('/student', 'StudentController');
    });
});
