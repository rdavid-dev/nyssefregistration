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

Route::prefix('admin')->group(function() {
    Route::middleware(['admin_logged_in'])->group(function () {
        Route::get('/', 'AuthController@get_login');
        Route::get('admin-login', ['uses' => 'AuthController@get_login', 'as' => 'admin-login']);
        Route::post('admin-login', ['uses' => 'AuthController@post_login', 'as' => 'admin-login']);
        Route::post('admin-forgotpassword', ['uses' => 'AuthController@post_forgot_password', 'as' => 'admin-forgotpassword']);
        Route::get('admin-lockscreen', ['uses' => 'AuthController@get_lockscreen', 'as' => 'admin-lockscreen']);
        Route::post('admin-lockscreen', ['uses' => 'AuthController@post_lockscreen', 'as' => 'admin-lockscreen']);
    });

    Route::middleware(['admin_not_logged_in'])->group(function () {
        Route::get('admin-logout', ['uses' => 'AuthController@logout', 'as' => 'admin-logout']);

        Route::get('admin-events',['uses'=>'EventController@index','as'=>'admin-events']);
        Route::get('admin-events-list-datatable',['uses'=>'EventController@admin_events_list_datatable','as'=>'admin-events-list-datatable']);
        Route::get('admin-addevent',['uses'=>'EventController@add_event','as'=>'admin-addevent']);
        Route::post('admin-addevent',['uses'=>'EventController@post_event','as'=>'admin-addevent']);
        Route::get('admin-updateevent/{id}',['uses'=>'EventController@update_event','as'=>'admin-updateevent']);
        Route::post('admin-updateevent/{id}',['uses'=>'EventController@post_update_event','as'=>'admin-updateevent']);
        Route::get('admin-deleteevent',['uses'=>'EventController@delete','as'=>'admin-deleteevent']);
        Route::get('admin-addschedule/{id}',['uses'=>'EventController@add_schedule','as'=>'admin-addschedule']);
        Route::post('admin-addschedule/{id}',['uses'=>'EventController@post_schedule','as'=>'admin-addschedule']);
        Route::get('admin-listschedule/{id}',['uses' =>'EventController@list_schedule','as' =>'admin-listschedule']);
        Route::get('admin-schedule-list-datatable/{id}',['uses'=>'EventController@admin_schedule_list_datatable','as'=>'admin-schedule-list-datatable']);
        Route::get('admin-deleteschedule',['uses'=>'EventController@scheduledelete','as'=>'admin-deleteschedule']);
        Route::get('admin-updateschedule/{id}',['uses'=>'EventController@update_schedule','as'=>'admin-updateschedule']);
        Route::post('admin-updateschedule/{id}',['uses'=>'EventController@post_update_schedule','as'=>'admin-updateschedule']);

        Route::get('admin-registration-setting',['uses'=>'RegistrationsettingController@index','as'=>'admin-registration-setting']);
        Route::get('admin-registrations-list-datatable',['uses'=>'RegistrationsettingController@admin_registrations_list_datatable','as'=>'admin-registrations-list-datatable']);
        Route::get('admin-addregistersetting',['uses'=>'RegistrationsettingController@add_registersetting','as'=>'admin-addregistersetting']);
        Route::post('admin-addregistersetting',['uses'=>'RegistrationsettingController@post_registersetting','as'=>'admin-addregistersetting']);
        Route::get('admin-updateregistersetting/{id}',['uses'=>'RegistrationsettingController@update_registersetting','as'=>'admin-updateregistersetting']);
        Route::post('admin-updateregistersetting/{id}',['uses'=>'RegistrationsettingController@post_update_registersetting','as'=>'admin-updateregistersetting']);
        Route::get('admin-deletesetting',['uses'=>'RegistrationsettingController@delete','as'=>'admin-deletesetting']);

        Route::get('admin-school',['uses'=>'SchoolController@index','as'=>'admin-school']);
        Route::get('admin-school-list-datatable',['uses'=>'SchoolController@admin_school_list_datatable','as'=>'admin-school-list-datatable']);
        Route::get('admin-addschool',['uses'=>'SchoolController@add_school','as'=>'admin-addschool']);
        Route::post('admin-addschool',['uses'=>'SchoolController@post_school','as'=>'admin-addschool']);
        Route::get('admin-updateschool/{id}',['uses'=>'SchoolController@update_school','as'=>'admin-updateschool']);
        Route::post('admin-updateschool/{id}',['uses'=>'SchoolController@post_updateschool','as'=>'admin-updateschool']);
        Route::get('admin-deleteschool',['uses'=>'SchoolController@schooldelete','as'=>'admin-deleteschool']);

        Route::get('admin-students',['uses'=>'StudentController@index','as'=>'admin-students']);
        Route::get('admin-viewstudent/{id}', ['uses' => 'StudentController@view', 'as' => 'admin-viewstudent']);
        Route::get('admin-students-list-datatable', ['uses' => 'StudentController@get_students_list_datatable', 'as' => 'admin-students-list-datatable']);
        Route::get('admin-addstudent', ['uses' => 'StudentController@add_student', 'as' => 'admin-addstudent']);
        Route::post('admin-addstudent', ['uses' => 'StudentController@post_student', 'as' => 'admin-addstudent']);
        Route::post('check-teacher-code-verify',['uses'=>'StudentController@check_teacher_code_verify','as'=>'check-teacher-code-verify']);
        Route::get('admin-deletestudent', ['uses' => 'StudentController@delete', 'as' => 'admin-deletestudent']);
        Route::get('admin-updatestudents/{id}', ['uses' => 'StudentController@get_update', 'as' => 'admin-updatestudents']);
        Route::post('admin-updatestudents/{id}', ['uses' => 'StudentController@post_update', 'as' => 'admin-updatestudents']);
        Route::get('admin-exportstudent',['uses'=>'StudentController@export','as'=>'admin-exportstudent']);

        Route::get('admin-teachers',['uses'=>'TeacherController@index','as'=>'admin-teachers']);
        Route::get('admin-teachers-list-datatable', ['uses' => 'TeacherController@get_teachers_list_datatable', 'as' => 'admin-teachers-list-datatable']);
        Route::get('admin-viewteacher/{id}', ['uses' => 'TeacherController@view', 'as' => 'admin-viewteacher']);
        Route::get('admin-updateteacher/{id}', ['uses' => 'TeacherController@get_update', 'as' => 'admin-updateteacher']);
        Route::get('admin-addteacher', ['uses' => 'TeacherController@add_teacher', 'as' => 'admin-addteacher']);
        Route::post('admin-addteacher', ['uses' => 'TeacherController@post_add_teacher', 'as' => 'admin-addteacher']);
        Route::post('admin-updateteacher/{id}', ['uses' => 'TeacherController@post_update', 'as' => 'admin-updateteacher']);
        Route::get('admin-deleteteacher', ['uses' => 'TeacherController@delete', 'as' => 'admin-deleteteacher']);
        Route::get('admin-exportteacher',['uses'=> 'TeacherController@export','as'=>'admin-exportteacher']);

        Route::get('admin-division',['uses'=>'DivisionController@index','as'=>'admin-division']);
        Route::get('admin-divisions-list-datatable', ['uses' => 'DivisionController@get_divisions_list_datatable', 'as' => 'admin-divisions-list-datatable']);
        Route::get('admin-adddivision',['uses'=>'DivisionController@add_division','as'=>'admin-adddivision']);
        Route::post('admin-adddivision',['uses'=>'DivisionController@post_add_division','as'=>'admin-adddivision']);
        Route::get('admin-viewdivision/{id}', ['uses' => 'DivisionController@view', 'as' => 'admin-viewdivision']);
        Route::get('admin-updatedivision/{id}', ['uses' => 'DivisionController@get_update', 'as' => 'admin-updatedivision']);
        Route::post('admin-updatedivision/{id}', ['uses' => 'DivisionController@post_update', 'as' => 'admin-updatedivision']);
        Route::get('admin-deletedivision', ['uses' => 'DivisionController@delete', 'as' => 'admin-deletedivision']);

        Route::get('admin-division-category',['uses'=>'DivisioncategoryController@index','as'=>'admin-division-category']);
        Route::get('admin-divisioncategories-list-datatable', ['uses' => 'DivisioncategoryController@get_divisioncategories_list_datatable', 'as' => 'admin-divisioncategories-list-datatable']);
        Route::get('admin-adddivisioncatyegory',['uses'=>'DivisioncategoryController@add_divisioncategory','as'=>'admin-adddivisioncatyegory']);
        Route::post('admin-adddivisioncatyegory',['uses'=>'DivisioncategoryController@post_divisioncategory','as'=>'admin-adddivisioncatyegory']);
        Route::get('admin-updatedivisioncategory/{id}', ['uses' => 'DivisioncategoryController@get_update', 'as' => 'admin-updatedivisioncategory']);
        Route::post('admin-updatedivisioncategory/{id}', ['uses' => 'DivisioncategoryController@post_update', 'as' => 'admin-updatedivisioncategory']);
        Route::get('admin-deletedivisioncategory', ['uses' => 'DivisioncategoryController@delete', 'as' => 'admin-deletedivisioncategory']);

        Route::get('admin-participationform',['uses'=>'ParticipationformController@index','as'=>'admin-participationform']);
        Route::get('admin-participation-list-datatable', ['uses' => 'ParticipationformController@get_participation_list_datatable', 'as' => 'admin-participation-list-datatable']);
        Route::get('admin-addparticipation',['uses'=>'ParticipationformController@add_participation','as'=>'admin-addparticipation']);
        Route::post('admin-addparticipation',['uses'=>'ParticipationformController@post_participation','as'=>'admin-addparticipation']);
        Route::get('admin-updateparticipation/{id}', ['uses' => 'ParticipationformController@get_update', 'as' => 'admin-updateparticipation']);
        Route::post('admin-updateparticipation/{id}', ['uses' => 'ParticipationformController@post_update', 'as' => 'admin-updateparticipation']);
        Route::get('admin-deleteparticipation', ['uses' => 'ParticipationformController@delete', 'as' => 'admin-deleteparticipation']);

        Route::get('admin-AndromedaRegistration/{id}',['uses' => 'RegistrationController@index','as'=>'admin-AndromedaRegistration']);
        Route::get('admin-BroadcomRegistration/{id}',['uses' => 'RegistrationController@index','as'=>'admin-BroadcomRegistration']);
        Route::get('admin-NYSSEFRegistration/{id}',['uses' => 'RegistrationController@index','as'=>'admin-NYSSEFRegistration']);
        Route::get('admin-divisionRegistration/{id}',['uses' => 'RegistrationController@index','as'=>'admin-divisionRegistration']);
        Route::get('admin-registration-list-datatable/{id}', ['uses' => 'RegistrationController@get_registration_list_datatable', 'as' => 'admin-registration-list-datatable']);
        Route::get('admin-viewdivisionregistration/{id}', ['uses' => 'RegistrationController@view', 'as' => 'admin-viewdivisionregistration']);
        Route::get('admin-teacherRegistration',['uses'=>'RegistrationController@teacher_registration','as'=>'admin-teacherRegistration']);
        Route::get('admin-teacherregistration-list-datatable', ['uses' => 'RegistrationController@get_teacherregistration_list_datatable', 'as' => 'admin-teacherregistration-list-datatable']);
        Route::get('admin-viewteacherregistration/{id}', ['uses' => 'RegistrationController@view_teacher_registration', 'as' => 'admin-viewteacherregistration']);
        Route::get('admin-exportregistration/{id}',['uses' => 'RegistrationController@export_division_registration','as'=>'admin-exportregistration']);
        Route::get('admin-exportTeacherRegistration',['uses' => 'RegistrationController@export_teacher_registration','as'=>'admin-exportTeacherRegistration']);

        Route::get('admin-volunteer-positions',['uses'=>'VolunteerpositionController@index','as'=>'admin-volunteer-positions']);
        Route::get('admin-volunteer-list-datatable', ['uses' => 'VolunteerpositionController@get_volunteer_list_datatable', 'as' => 'admin-volunteer-list-datatable']);
        Route::get('admin-addvolunteerposition',['uses' => 'VolunteerpositionController@add_volunteerposition','as'=>'admin-addvolunteerposition']);
        Route::post('admin-addvolunteerposition',['uses' => 'VolunteerpositionController@post_volunteerposition','as'=>'admin-addvolunteerposition']);
        Route::get('admin-updatevolunteerposition/{id}', ['uses' => 'VolunteerpositionController@get_update', 'as' => 'admin-updatevolunteerposition']);
        Route::post('admin-updatevolunteerposition/{id}', ['uses' => 'VolunteerpositionController@post_update', 'as' => 'admin-updatevolunteerposition']);
        Route::get('admin-deletepotion', ['uses' => 'VolunteerpositionController@delete', 'as' => 'admin-deletepotion']);

        Route::get('admin-judgeregistration',['uses' => 'JudgeController@index','as'=>'admin-judgeregistration']);
        Route::get('admin-judge-list-datatable', ['uses' => 'JudgeController@get_judge_list_datatable', 'as' => 'admin-judge-list-datatable']);
        Route::get('admin-addjudgeregistration',['uses'=>'JudgeController@add_judgeregistration','as'=>'admin-addjudgeregistration']);
        Route::get('admin-viewjudgeregistration/{id}',['uses' =>'JudgeController@view','as'=>'admin-viewjudgeregistration']);
        Route::get('admin-exportjudge',['uses'=>'JudgeController@export','as'=>'admin-exportjudge']);

        Route::get('admin-volunteerregistration',['uses'=>'VolunteerController@index','as'=>'admin-volunteerregistration']);
        Route::get('admin-volunteerreg-list-datatable', ['uses' => 'VolunteerController@get_volunteerreg_list_datatable', 'as' => 'admin-volunteerreg-list-datatable']);
        Route::get('admin-viewvolunteerregistration/{id}',['uses' =>'VolunteerController@view','as'=>'admin-viewvolunteerregistration']);
        Route::get('admin-exportvolunteer',['uses'=>'VolunteerController@export','as'=>'admin-exportvolunteer']);

        Route::get('admin-form',['uses'=>'FormController@index','as'=>'admin-form']);
        Route::get('admin-form-list-datatable',['uses'=>'FormController@admin_form_list_datatable','as'=>'admin-form-list-datatable']);
        Route::get('admin-addform',['uses'=>'FormController@add_form','as'=>'admin-addform']);
        Route::post('admin-addform',['uses'=>'FormController@post_form','as'=>'admin-addform']);
        Route::get('admin-updateform/{id}',['uses'=>'FormController@get_update','as'=>'admin-updateform']);
        Route::post('admin-updateform/{id}',['uses'=>'FormController@post_update','as'=>'admin-updateform']);
        Route::get('admin-deleteform',['uses'=>'FormController@delete','as'=>'admin-deleteform']);

        Route::get('admin-cms', ['uses' => 'CmsController@index', 'as' => 'admin-cms']);
        Route::get('admin-viewcms/{id}', ['uses' => 'CmsController@view', 'as' => 'admin-viewcms']);
        Route::get('admin-updatecms/{id}', ['uses' => 'CmsController@get_update', 'as' => 'admin-updatecms']);
        Route::post('admin-updatecms/{id}', ['uses' => 'CmsController@post_update', 'as' => 'admin-updatecms']);

        Route::get('admin-contact', ['uses' => 'ContactController@index', 'as' => 'admin-contact']);
        Route::get('admin-viewcontact/{id}', ['uses' => 'ContactController@view', 'as' => 'admin-viewcontact']);
        Route::post('send-reply/{id}', ['uses' => 'ContactController@send_reply', 'as' => 'send-reply']);

        Route::get('admin-dashboard', ['uses' => 'DashboardController@index', 'as' => 'admin-dashboard']);

        Route::get('admin-emails', ['uses' => 'EmailController@index', 'as' => 'admin-emails']);
        Route::get('admin-viewemail/{id}', ['uses' => 'EmailController@view', 'as' => 'admin-viewemail']);
        Route::get('admin-updateemail/{id}', ['uses' => 'EmailController@get_update', 'as' => 'admin-updateemail']);
        Route::post('admin-updateemail/{id}', ['uses' => 'EmailController@post_update', 'as' => 'admin-updateemail']);

        Route::get('admin-myprofile', ['uses' => 'MyprofileController@get_myprofile', 'as' => 'admin-myprofile']);
        Route::post('admin-myprofile', ['uses' => 'MyprofileController@post_myprofile', 'as' => 'admin-myprofile']);

        Route::get('admin-seo', ['uses' => 'SeoController@index', 'as' => 'admin-seo']);
        Route::get('admin-viewseo/{id}', ['uses' => 'SeoController@view', 'as' => 'admin-viewseo']);
        Route::get('admin-updateseo/{id}', ['uses' => 'SeoController@get_update', 'as' => 'admin-updateseo']);
        Route::post('admin-updateseo/{id}', ['uses' => 'SeoController@post_update', 'as' => 'admin-updateseo']);

        Route::get('admin-settings', ['uses' => 'SettingsController@index', 'as' => 'admin-settings']);
        Route::post('admin-settings', ['uses' => 'SettingsController@post_update', 'as' => 'admin-settings']);

        Route::get('admin-staticpages', ['uses' => 'StaticpageController@index', 'as' => 'admin-staticpages']);
        Route::get('admin-viewstaticpage/{id}', ['uses' => 'StaticpageController@view', 'as' => 'admin-viewstaticpage']);
        Route::get('admin-updatestaticpage/{id}', ['uses' => 'StaticpageController@get_update', 'as' => 'admin-updatestaticpage']);
        Route::post('admin-updatestaticpage/{id}', ['uses' => 'StaticpageController@post_update', 'as' => 'admin-updatestaticpage']);

        Route::get('admin-users', ['uses' => 'UserController@index', 'as' => 'admin-users']);
        Route::get('admin-viewuser/{id}', ['uses' => 'UserController@view', 'as' => 'admin-viewuser']);
        Route::get('admin-users-list-datatable', ['uses' => 'UserController@get_users_list_datatable', 'as' => 'admin-users-list-datatable']);
        Route::get('admin-adduser', ['uses' => 'UserController@add_user', 'as' => 'admin-adduser']);
        Route::post('admin-adduser', ['uses' => 'UserController@post_add_user', 'as' => 'admin-adduser']);
        Route::get('admin-updateuser/{id}', ['uses' => 'UserController@get_update', 'as' => 'admin-updateuser']);
        Route::post('admin-updateuser/{id}', ['uses' => 'UserController@post_update', 'as' => 'admin-updateuser']);
        Route::get('admin-deleteuser', ['uses' => 'UserController@delete', 'as' => 'admin-deleteuser']);

        Route::get('admin-faqs', ['uses' => 'FaqController@index', 'as' => 'admin-faqs']);
        Route::get('admin-createfaq', ['uses' => 'FaqController@get_create', 'as' => 'admin-createfaq']);
        Route::post('admin-createfaq', ['uses' => 'FaqController@post_create', 'as' => 'admin-createfaq']);
        Route::get('admin-viewfaq/{id}', ['uses' => 'FaqController@view', 'as' => 'admin-viewfaq']);
        Route::get('admin-updatefaq/{id}', ['uses' => 'FaqController@get_update', 'as' => 'admin-updatefaq']);
        Route::post('admin-updatefaq/{id}', ['uses' => 'FaqController@post_update', 'as' => 'admin-updatefaq']);
        Route::get('admin-deletefaq', ['uses' => 'FaqController@delete', 'as' => 'admin-deletefaq']);


        Route::get('admin-sliders', ['uses' => 'SliderController@index', 'as' => 'admin-sliders']);
        Route::get('admin-viewslider/{id}', ['uses' => 'SliderController@view', 'as' => 'admin-viewslider']);
        Route::get('admin-sliders-list-datatable', ['uses' => 'SliderController@get_sliders_list_datatable', 'as' => 'admin-sliders-list-datatable']);
        Route::get('admin-addslider', ['uses' => 'SliderController@add_slider', 'as' => 'admin-addslider']);
        Route::post('admin-addslider', ['uses' => 'SliderController@post_add_slider', 'as' => 'admin-addslider']);
        Route::get('admin-updateslider/{id}', ['uses' => 'SliderController@get_update', 'as' => 'admin-updateslider']);
        Route::post('admin-updateslider/{id}', ['uses' => 'SliderController@post_update', 'as' => 'admin-updateslider']);
        Route::get('admin-deleteslider', ['uses' => 'SliderController@delete', 'as' => 'admin-deleteslider']);
        
        Route::get('admin-plans', ['uses' => 'PlanController@index', 'as' => 'admin-plans']);
        Route::get('admin-viewplan/{id}', ['uses' => 'PlanController@view', 'as' => 'admin-viewplan']);
        Route::get('admin-plans-list-datatable', ['uses' => 'PlanController@get_plans_list_datatable', 'as' => 'admin-plans-list-datatable']);
        Route::get('admin-addplan', ['uses' => 'PlanController@add_plan', 'as' => 'admin-addplan']);
        Route::post('admin-addplan', ['uses' => 'PlanController@post_add_plan', 'as' => 'admin-addplan']);
        Route::get('admin-updateplan/{id}', ['uses' => 'PlanController@get_update', 'as' => 'admin-updateplan']);
        Route::post('admin-updateplan/{id}', ['uses' => 'PlanController@post_update', 'as' => 'admin-updateplan']);
        Route::get('admin-deleteplan', ['uses' => 'PlanController@delete', 'as' => 'admin-deleteplan']);

    });
});
