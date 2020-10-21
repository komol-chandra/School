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
    //Student Without ajax
    Route::resource('/student', 'StudentController');
    Route::get('/student/show/{id}', 'StudentController@show');
    Route::get('/student/guardian_list', 'StudentController@guardian_list');
    Route::get('/student/sectionData/{id}', 'StudentController@sectionData');

    Route::resource('/subject', 'SubjectModelController');
    Route::resource('/department', 'DepartmentController');
    Route::resource('/classroom', 'ClassRoomController');
    Route::resource('/settings', 'AppSettingsController');
    Route::resource('/library', 'LibraryModelController');
    Route::resource('/class_routine', 'ClassRoutineController');
    Route::resource('/session', 'SessionManagerController');
    //Teacher with out ajax
    Route::resource('teacher','TeacherController');
    Route::get('/teacher/show/{id}','TeacherController@show');    
    });
});
