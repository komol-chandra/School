<?php
use Illuminate\Support\Facades\Route;
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
// })->name('dashboard');

Route::get('/admin', 'MainController@index');
Route::get('/', 'MainController@index');
Route::get('/ex', 'MainController@ex');
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::resource('/subject', 'SubjectModelController');
        Route::resource('/department', 'DepartmentController');
        Route::resource('/classroom', 'ClassRoomController');
        Route::resource('/settings', 'AppSettingsController');
        Route::resource('/library', 'LibraryModelController');
        Route::resource('/class_routine', 'ClassRoutineController');
        Route::resource('/session', 'SessionManagerController');
        Route::resource('/class', 'ClassNameController');
        Route::resource('/section', 'SectionNameController');
        Route::resource('/eventCalender', 'EventCalendersController');
        Route::resource('/staff', 'StaffsController');
        Route::resource('/routine', 'RoutineBasesController');
        Route::resource('/notice', 'NoticeController');
        Route::resource('/daily_attendance', 'AttendanceController');
        Route::get('/routine/sectionData/{id}', 'RoutineBasesController@sectionData');
        //Student
        Route::resource('/student', 'StudentController');
        Route::get('/studentList', 'StudentController@studentList');
        Route::get('/guardianList', 'StudentController@guardianList');
        Route::get('/student/sectionData/{id}', 'StudentController@sectionData');
        //Teacher
        Route::resource('teacher', 'TeacherController');
        Route::get('/teacherList', 'TeacherController@teacherList');
        //Syllabus with out ajax
        Route::resource('syllabus', 'SyllabusController');
    });
});
