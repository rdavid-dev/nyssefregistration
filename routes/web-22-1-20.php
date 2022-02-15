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

Route::middleware(['web'])->group(function () {
    Route::get('', ['uses' => 'SiteController@index', 'as' => 'index']);
    Route::get('/', ['uses' => 'SiteController@index', 'as' => '/']);
    Route::get('index', ['uses' => 'SiteController@index', 'as' => 'index']);

    Route::get('contact-us', ['uses' => 'SiteController@get_contact_page', 'as' => 'contact-us']);
    Route::Post('contact-us', ['uses' => 'SiteController@post_contact', 'as' => 'contact-us']);

    Route::get('get-school', ['uses' => 'SiteController@get_school', 'as' => 'get-school']);
    Route::get('get-school-type', ['uses' => 'SiteController@get_school_type', 'as' => 'get-school-type']);
    Route::get('get-all-state', ['uses' => 'SiteController@get_all_state', 'as' => 'get-all-state']);
    Route::get('register', ['uses' => 'SiteController@get_register', 'as' => 'register']);
    Route::get('judge-volunteer', ['uses' => 'SiteController@get_judge_volunteer', 'as' => 'judge-volunteer']);

    Route::get('teacher-registration', ['uses' => 'SiteController@teacher_registration', 'as' => 'teacher-registration']);
    Route::post('teacher-registration', ['uses' => 'SiteController@post_teacher_registration', 'as' => 'teacher-registration']);
    Route::get('student-registration', ['uses' => 'SiteController@student_registration', 'as' => 'student-registration']);
    Route::post('student-registration', ['uses' => 'SiteController@post_student_registration', 'as' => 'student-registration']);
    Route::post('verify-teacher-given-code', ['uses' => 'SiteController@post_verify_teacher_given_code', 'as' => 'verify-teacher-given-code']);
    Route::get('judge-registration', ['uses' => 'SiteController@judge_registration', 'as' => 'judge-registration']);
    Route::post('judge-registration', ['uses' => 'SiteController@post_judge_registration', 'as' => 'judge-registration']);
    Route::get('volunteer-registration', ['uses' => 'SiteController@volunteer_registration', 'as' => 'volunteer-registration']);
    Route::post('volunteer-registration', ['uses' => 'SiteController@post_volunteer_registration', 'as' => 'volunteer-registration']);

    Route::get('teacher-login', ['uses' => 'SiteController@teacher_login', 'as' => 'teacher-login']);
    Route::post('teacher-login', ['uses' => 'SiteController@post_teacher_login', 'as' => 'teacher-login']);
    Route::get('student-login', ['uses' => 'SiteController@student_login', 'as' => 'student-login']);
    Route::post('student-login', ['uses' => 'SiteController@post_student_login', 'as' => 'student-login']);

    Route::get('forgot-password', ['uses' => 'SiteController@get_forgot_password', 'as' => 'forgot-password']);
    Route::post('forgot-password', ['uses' => 'SiteController@post_forgot_password', 'as' => 'forgot-password']);
    Route::get('reset-password/{id}/{token}', ['uses' => 'SiteController@get_reset_password', 'as' => 'reset-password']);
    Route::post('reset-password', ['uses' => 'SiteController@post_reset_password', 'as' => 'reset-password']);

    Route::middleware(['user_logged_in'])->group(function () {
        Route::get('', ['uses' => 'SiteController@index', 'as' => 'index']);
        Route::get('/', ['uses' => 'SiteController@index', 'as' => 'index']);
    });


    Route::middleware(['user_not_logged_in'])->group(function () {
        Route::get('dashboard', ['uses' => 'DashboardController@dashboard', 'as' => 'dashboard']);
        Route::get('students-list-datatable', ['uses' => 'DashboardController@students_list_datatable', 'as' => 'students-list-datatable']);
        Route::get('logout', ['uses' => 'SiteController@logout', 'as' => 'logout']);

        Route::get('change-password', ['uses' => 'UserController@change_password', 'as' => 'change-password']);
        Route::post('change-password', ['uses' => 'UserController@update_change_password', 'as' => 'change-password']);

        Route::get('manage-account', ['uses' => 'UserController@manage_account', 'as' => 'manage-account']);
        Route::post('manage-account', ['uses' => 'UserController@post_manage_account', 'as' => 'manage-account']);

        Route::get('broadcom-registration', ['uses' => 'RegistrationController@broadcom_registration', 'as' => 'broadcom-registration']);
        //Route::post('broadcom-registration',['uses'=>'RegistrationController@post_broadcom_registration','as' =>'broadcom-registration']);
        Route::get('andromeda-registration', ['uses' => 'RegistrationController@andromeda_registration', 'as' => 'andromeda-registration']);
        //Route::post('andromeda-registration',['uses'=>'RegistrationController@post_andromeda_registration','as' =>'andromeda-registration']);
        Route::get('isef-registration', ['uses' => 'RegistrationController@isef_registration', 'as' => 'isef-registration']);
        Route::post('registration', ['uses' => 'RegistrationController@post_registration', 'as' => 'registration']);

        Route::get('isef-form-upload', ['uses' => 'RegistrationController@isef_form_upload', 'as' => 'isef-form-upload']);
        Route::post('isef-form-upload', ['uses' => 'RegistrationController@post_isef_form_upload', 'as' => 'isef-form-upload']);

        /*         * *************************Online Registration List for Teacher*************************** */
        Route::get('teacher-event-registration', ['uses' => 'RegistrationController@teacher_event_registration', 'as' => 'teacher-event-registration']);
        Route::post('teacher-event-registration', ['uses' => 'RegistrationController@post_teacher_event_registration', 'as' => 'teacher-event-registration']);
        Route::get('get-online-registration-list/{id}', ['uses' => 'DashboardController@get_online_registration_list', 'as' => 'get-online-registration-list']);
        Route::get('online-registration-details/{id}', ['uses' => 'DashboardController@registration_details', 'as' => 'online-registration-details']);
        Route::get('student-details/{id}', ['uses' => 'DashboardController@student_details', 'as' => 'student-details']);
        Route::post('delete-student', ['uses' => 'DashboardController@post_student_delete', 'as' => 'delete-student']);
    });
});
