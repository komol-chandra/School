<?php
use Illuminate\Support\Facades\Route;
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin', 'MainController@index');
Route::get('/', 'MainController@index');
Route::get('/ex', 'MainController@ex');
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        //Dashboard Elements
        Route::get('/teacherDashboard', 'MainController@teacherDashboard');
        Route::get('/studentDashboard', 'MainController@studentDashboard');
        Route::get('/staffDashboard', 'MainController@staffDashboard');
        Route::get('/parentDashboard', 'MainController@parentDashboard');

        Route::resource('/subject', 'SubjectModelController');
        Route::resource('/department', 'DepartmentController');
        Route::resource('/classroom', 'ClassRoomController');
        Route::resource('/settings', 'AppSettingsController');
        Route::resource('/library', 'LibraryModelController');
        Route::resource('/session', 'SessionManagerController');
        Route::resource('/class', 'ClassNameController');
        Route::resource('/section', 'SectionNameController');
        Route::resource('/eventCalender', 'EventCalendersController');

        Route::resource('syllabus', 'SyllabusController');
        Route::get('/syllabus/sectionData/{id}', 'SyllabusController@sectionData');

        Route::resource('/staff', 'StaffsController');
        Route::resource('/notice', 'NoticeController');
        Route::resource('/daily_attendance', 'AttendanceController');
        //Routine
        Route::resource('/routine', 'RoutineBasesController');
        Route::get('/routine/sectionData/{id}', 'RoutineBasesController@sectionData');
        Route::get('/routineList', 'RoutineBasesController@routineList');
        //Student
        Route::resource('/student', 'StudentController');
        Route::get('/studentList', 'StudentController@studentList');
        Route::get('/guardianList', 'StudentController@guardianList');
        Route::get('/student/sectionData/{id}', 'StudentController@sectionData');
        //Teacher
        Route::resource('teacher', 'TeacherController');
        Route::get('/teacherList', 'TeacherController@teacherList');
        //Profile
        Route::resource('/profile', 'ProfileController');
        Route::post('profile/password', 'ProfileController@password');
        //System Setting
        Route::resource('system_setting', 'SystemSettingController');
        //School Setting
        Route::resource('school_setting', 'SchoolSettingController');
        //About Developer
        Route::get('about_developer', function () {
            return view('layouts.Settings.about_developer');
        });
        //WebSite Settings
        Route::resource('web_settings', 'GeneralSettingController');
        Route::resource('about_us', 'AboutUsSettingController');
        Route::resource('terms_and_condition', 'TermsConditionController');
        Route::resource('privacy_policy', 'PrivacyPolicyController');
        Route::resource('home_page_slider', 'HomePageSliderController');

        // Route::get('web_settings', function () {
        //     return view('layouts.Settings.web_settings');
        // });

    });
});
