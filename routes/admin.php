<?php

use App\Http\Controllers\Admin\GradingSchemeController;
use App\Http\Controllers\Admin\HighestLevelEducationController;
use App\Http\Controllers\Admin\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AssignRecruiterToRmController;
use App\Http\Controllers\Admin\LeadStatusController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\MailController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(static function () {

    // Guest routes
    Route::middleware('guest:admin')->group(static function () {
        // Auth routes
        Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin.login');
        Route::post('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store']);
        // Forgot password
        Route::get('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [\App\Http\Controllers\Admin\Auth\PasswordResetLinkController::class, 'store'])->name('admin.password.email');
        // Reset password
        Route::get('reset-password/{token}', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [\App\Http\Controllers\Admin\Auth\NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    // Verify email routes
    Route::middleware(['auth:admin'])->group(static function () {
        Route::get('verify-email', [\App\Http\Controllers\Admin\Auth\EmailVerificationPromptController::class, '__invoke'])->name('admin.verification.notice');
        Route::get('verify-email/{id}/{hash}', [\App\Http\Controllers\Admin\Auth\VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('admin.verification.verify');
        Route::post('email/verification-notification', [\App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('admin.verification.send');
    });

    // Authenticated routes
    Route::middleware(['auth:admin', 'verified'])->group(static function () {
        // Confirm password routes
        Route::get('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
        Route::post('confirm-password', [\App\Http\Controllers\Admin\Auth\ConfirmablePasswordController::class, 'store']);
        // Logout route
        Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        // General routes
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
        Route::get('profile', [\App\Http\Controllers\Admin\HomeController::class, 'profile'])->middleware('password.confirm.admin')->name('admin.profile');
    });

     //Category
     Route::middleware(['auth:admin', 'verified'])->group(static function () {
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'category'])->name('category.index');
        Route::get('/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'addCategory'])->name('category.addCategory');
        Route::post('/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'storeCategory'])->name('storeCategory');
        Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('editCategory');
        Route::post('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('category.updateCategory');
        Route::get('/delete_category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('deleteCategory');

    });

   

    //Country
     Route::middleware(['auth:admin', 'verified'])->group(static function () {
        Route::get('/country', [App\Http\Controllers\Admin\CountryController::class, 'country'])->name('country.index');
        Route::get('/country/addCountry', [App\Http\Controllers\Admin\CountryController::class, 'addCountry'])->name('country.addCountry');
        Route::post('/country/storeCountry', [App\Http\Controllers\Admin\CountryController::class, 'storeCountry'])->name('country.storeCountry');
        Route::get('/country/editCountry/{id}', [App\Http\Controllers\Admin\CountryController::class, 'editCountry'])->name('country.editCountry');
        Route::post('/country/updateCountry/{id}', [App\Http\Controllers\Admin\CountryController::class, 'updateCountry'])->name('country.updateCountry');
        Route::get('/country/delete_country/{id}', [App\Http\Controllers\Admin\CountryController::class, 'deleteCountry'])->name('country/deleteCountry');

        //States
        Route::get('/states', [App\Http\Controllers\Admin\StateController::class, 'index'])->name('states.index');
        Route::get('/getStates/{id}', [App\Http\Controllers\Admin\StateController::class, 'getStates'])->name('states.getStates');
        Route::get('/states/create', [App\Http\Controllers\Admin\StateController::class, 'create'])->name('states.create');
        Route::post('/states/store', [App\Http\Controllers\Admin\StateController::class, 'store'])->name('states.store');
        Route::get('/states/edit/{id}', [App\Http\Controllers\Admin\StateController::class, 'edit'])->name('states.edit');
        Route::post('/states/update/{id}', [App\Http\Controllers\Admin\StateController::class, 'update'])->name('states.update');
        Route::get('/states/destroy/{id}', [App\Http\Controllers\Admin\StateController::class, 'destroy'])->name('states.destroy');

        // Cities
        Route::get('/cities', [App\Http\Controllers\Admin\CityController::class, 'index'])->name('cities.index');
        Route::get('/cities/create', [App\Http\Controllers\Admin\CityController::class, 'create'])->name('cities.create');
        Route::post('/cities/store', [App\Http\Controllers\Admin\CityController::class, 'store'])->name('cities.store');
        Route::get('/cities/edit/{id}', [App\Http\Controllers\Admin\CityController::class, 'edit'])->name('cities.edit');
        Route::post('/cities/update/{id}', [App\Http\Controllers\Admin\CityController::class, 'update'])->name('cities.update');
        Route::get('/cities/destroy/{id}', [App\Http\Controllers\Admin\CityController::class, 'destroy'])->name('cities.destroy');

        //College
        Route::get('/college', [App\Http\Controllers\Admin\CollegeController::class, 'index'])->name('college.index');
        Route::get('/college/create', [App\Http\Controllers\Admin\CollegeController::class, 'create'])->name('college.create');
        Route::post('/college/store', [App\Http\Controllers\Admin\CollegeController::class, 'store'])->name('college.store');
        Route::get('/college/edit/{id}', [App\Http\Controllers\Admin\CollegeController::class, 'editCollege'])->name('editCollege');
        Route::post('/college/update/{id}', [App\Http\Controllers\Admin\CollegeController::class, 'updateCollege'])->name('college.updateCollege');
        Route::get('/college/delete_college/{id}', [App\Http\Controllers\Admin\CollegeController::class, 'deleteCollege'])->name('deleteCollege');
        Route::get('/college/getDetail/{id}', [App\Http\Controllers\Admin\CollegeController::class, 'getDetail'])->name('college.getDetail');
        Route::get('/college/uploadexcel', [App\Http\Controllers\Admin\CollegeController::class, 'uploadexcel'])->name('college.uploadexcel');
        Route::post('/college/uploadexcelcsv', [App\Http\Controllers\Admin\CollegeController::class, 'uploadexcelcsv'])->name('college.uploadexcelcsv');
        
        //Course
        Route::get('/course', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('course.index');
        Route::get('/course/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('course.create');
        Route::post('/course/store', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('course.store');
        Route::get('/course/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('course.edit');
        Route::post('/course/update/{id}', [App\Http\Controllers\Admin\CourseController::class, 'update'])->name('course.update');
        Route::get('/course/destroy/{id}', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('course.destroy');
        Route::get('/course/getDetail/{id}', [App\Http\Controllers\Admin\CourseController::class, 'getDetail'])->name('course.getDetail');
        Route::get('/course/uploadexcel', [App\Http\Controllers\Admin\CourseController::class, 'uploadexcel'])->name('course.uploadexcel');
        Route::post('/course/uploadexcelcsv', [App\Http\Controllers\Admin\CourseController::class, 'uploadexcelcsv'])->name('course.uploadexcelcsv');
        
         Route::get('/course/uploadexcel', [App\Http\Controllers\Admin\CourseController::class, 'uploadexcel'])->name('course.uploadexcel');
        Route::post('/course/uploadexcelcsv', [App\Http\Controllers\Admin\CourseController::class, 'uploadexcelcsv'])->name('course.uploadexcelcsv');
        
        Route::post('/apply/course/{id}',[App\Http\Controllers\Admin\StudentApplyController::class, 'studentApply'])->name('course.applyCourse');
        Route::get('/course/apply', [App\Http\Controllers\Admin\CourseController::class, 'apply'])->name('course.apply');

        //student
        Route::get('/student', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('student.index');
         Route::get('/student/downloadFile/{file}/{type}', [App\Http\Controllers\Admin\StudentController::class, 'downloadFile'])->name('student.downloadFile');
        Route::get('/student/getDetail/{id}', [App\Http\Controllers\Admin\StudentController::class, 'getDetail'])->name('student.getDetail');
        Route::get('/student/getDocument/{id}', [App\Http\Controllers\Admin\StudentController::class, 'getDocument'])->name('student.getDocument');
        Route::get('/student/create', [App\Http\Controllers\Admin\StudentController::class, 'create'])->name('student.create');
        Route::post('/student/store', [App\Http\Controllers\Admin\StudentController::class, 'store'])->name('student.store');
        Route::get('/student/edit/{id}', [App\Http\Controllers\Admin\StudentController::class, 'edit'])->name('student.edit');
        Route::post('/student/update/{id}', [App\Http\Controllers\Admin\StudentController::class, 'update'])->name('student.update');
        Route::get('/student/destroy/{id}', [App\Http\Controllers\Admin\StudentController::class, 'destroy'])->name('student.destroy');
        Route::PUT('/student/team/assign/{id}', [App\Http\Controllers\Admin\StudentController::class, 'applicationTeam'])->name('student.team.assign');
        Route::put('/student/password/change/{id}', [App\Http\Controllers\Admin\StudentController::class, 'changePassword'])->name('student.password');
        Route::get('/student/status/{id}/{status}', [App\Http\Controllers\Admin\StudentController::class, 'changeStatus'])->name('student.status');
        Route::get('/student/leadstudent/{id}', [App\Http\Controllers\Admin\StudentController::class, 'leadstudent'])->name('student.leadstudent');
        
         Route::get('/student/uploadexcel', [App\Http\Controllers\Admin\StudentController::class, 'uploadexcel'])->name('student.uploadexcel');
        Route::post('/student/uploadexcelcsv', [App\Http\Controllers\Admin\StudentController::class, 'uploadexcelcsv'])->name('student.uploadexcelcsv');
        
        //add notes for student
         Route::post('/student/notes/eligible', [App\Http\Controllers\Admin\StudentNotesController::class, 'addNotes'])->name('student.addNotes');
         Route::post('/student/notes', [App\Http\Controllers\Admin\StudentNotesController::class, 'notStudentNotes'])->name('studentNot.addNotes');
        
         //recruiter
        Route::get('/recruiter', [App\Http\Controllers\Admin\RecruiterController::class, 'index'])->name('recruiter.index');
        Route::get('/recruiter/downloadFile/{file}/{type}', [App\Http\Controllers\Admin\RecruiterController::class, 'downloadFile'])->name('recruiter.downloadFile');
        Route::get('/recruiter/getDetail/{id}', [App\Http\Controllers\Admin\RecruiterController::class, 'getDetail'])->name('recruiter.getDetail');
        Route::get('/recruiter/getDocument/{id}', [App\Http\Controllers\Admin\RecruiterController::class, 'getDocument'])->name('recruiter.getDocument');
        Route::get('/recruiter/create', [App\Http\Controllers\Admin\RecruiterController::class, 'create'])->name('recruiter.create');
        Route::post('/recruiter/store', [App\Http\Controllers\Admin\RecruiterController::class, 'store'])->name('recruiter.store');
        Route::get('/recruiter/edit/{id}', [App\Http\Controllers\Admin\RecruiterController::class, 'edit'])->name('recruiter.edit');
        Route::post('/recruiter/update/{id}', [App\Http\Controllers\Admin\RecruiterController::class, 'update'])->name('recruiter.update');
        Route::get('/recruiter/destroy/{id}', [App\Http\Controllers\Admin\RecruiterController::class, 'destroy'])->name('recruiter.destroy');
        Route::put('/recruiter/password/change/{id}', [App\Http\Controllers\Admin\RecruiterController::class, 'changePassword'])->name('recruiter.password');
        Route::get('/recruiter/status/{id}/{status}', [App\Http\Controllers\Admin\RecruiterController::class, 'changeStatus'])->name('recruiter.status');
        
        Route::get('/recruiter/uploadexcel', [App\Http\Controllers\Admin\RecruiterController::class, 'uploadexcel'])->name('recruiter.uploadexcel');
        Route::post('/recruiter/uploadexcelcsv', [App\Http\Controllers\Admin\RecruiterController::class, 'uploadexcelcsv'])->name('recruiter.uploadexcelcsv');
        
        //add notes for recruiter
        Route::post('/recruiter/notes', [App\Http\Controllers\Admin\RecruiterNotesController::class, 'addNotes'])->name('recruiter.addNotes');

        
        //role
        Route::get('/role', [RoleController::class, 'index'])->name('role.index');
        Route::post('/role/create', [RoleController::class, 'roleCreate'])->name('role.create');
        Route::get('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        Route::put('/role/update/{id}', [RoleController::class, 'updateRole'])->name('role.update');

        //permission
        Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
        Route::post('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
        Route::get('/permission/destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
        Route::put('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');

        //users
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/application', [UserController::class, 'application'])->name('user.application');
        Route::get('/user/rm', [UserController::class, 'rm'])->name('user.rm');
        Route::get('/user/lockrm', [UserController::class, 'lockrm'])->name('user.lockrm');
        Route::get('/user/changeRMStatus/{id}', [UserController::class, 'changeRMStatus'])->name('user.changeRMStatus');
        Route::get('/user/unlockrm/{id}', [UserController::class, 'unlockrm'])->name('user.unlockrm');
        Route::get('/user/lockrmaction/{id}', [UserController::class, 'lockrmaction'])->name('user.lockrmaction');
        Route::get('/user/rm-unlock-history', [UserController::class, 'rmunlockhistory'])->name('user.rm-unlock-history');
        
        Route::get('/user/rm-unlock-Requests', [UserController::class, 'rmUnlockRequests'])->name('user.rm-unlock-Requests');

        //grading scheme
        Route::get('/grading/scheme', [GradingSchemeController::class, 'index'])->name('grading.index');
        Route::post('/grading/scheme/create', [GradingSchemeController::class, 'create'])->name('grading.create');
        Route::put('/grading/scheme/update/{id}', [GradingSchemeController::class, 'update'])->name('grading.update');
        Route::get('/grading/destroy/{id}', [GradingSchemeController::class, 'destroy'])->name('grading.destroy');

        //highest level education
        Route::get('/education/level', [HighestLevelEducationController::class, 'index'])->name('education.index');
        Route::post('/education/level/create', [HighestLevelEducationController::class, 'create'])->name('education.create');
        Route::put('/education/level/update/{id}', [HighestLevelEducationController::class, 'update'])->name('education.update');
        Route::get('/education/destroy/{id}', [HighestLevelEducationController::class, 'destroy'])->name('education.destroy');
        
        //Assign Recruiter To rm
        Route::get('/assignRecruiterToRm', [AssignRecruiterToRmController::class,'index'])->name('recruiterToRm.index');
        Route::post('/assignRecruiterToRm/create', [AssignRecruiterToRmController::class, 'create'])->name('recruiterToRm.create');
        Route::put('/assignRecruiterToRm/update/{id}', [AssignRecruiterToRmController::class, 'update'])->name('recruiterToRm.update');
        Route::get('/assign/destroy/{id}', [AssignRecruiterToRmController::class, 'destroy'])->name('recruiterToRm.destroy');

         //lead Status
        Route::get('/lead/status', [LeadStatusController::class, 'index'])->name('leadStatus.index');
        Route::post('/lead/status/create', [LeadStatusController::class, 'create'])->name('leadStatus.create');
        Route::put('/lead/status/update/{id}', [LeadStatusController::class, 'update'])->name('leadStatus.update');
        Route::get('/lead/destroy/{id}', [LeadStatusController::class, 'destroy'])->name('leadStatus.destroy');
        
         //reports
         Route::get('/reports', [ReportController::class, 'index'])->name('admin.report');
         Route::get('/basic_email', [ReportController::class, 'basic_email'])->name('admin.basic_email');
        
        //reports
       // Route::get('/reports', [MailController::class, 'basic_email'])->name('admin.report');
       
       //chat
       Route::get('/chat', [\App\Http\Controllers\Admin\ChatController::class, 'index'])->name('chat.index');
       
       Route::get('/application', [App\Http\Controllers\Admin\ApplicationController::class, 'index'])->name('student.application');
       Route::post('/application/create', [App\Http\Controllers\Admin\ApplicationController::class, 'create'])->name('student.applicationCreate');
       Route::get('/course/getCourses/{college_id}', [App\Http\Controllers\Admin\ApplicationController::class, 'getCourses'])->name('getcourses');
       Route::post('/application/create/app', [App\Http\Controllers\Admin\ApplicationController::class, 'apply'])->name('student.applyApp');
       
        //mou
       Route::get('/student/mou', [App\Http\Controllers\Admin\MouController::class, 'index'])->name('student.mou');
       
       //profile
       Route::get('admin/profile', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.profile');
       Route::put('admin/profile/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('admin.updateProfile');
       
        //College & Course Filter
       Route::get('college/filter',[App\Http\Controllers\Admin\CollegeCourseFilterController::class, 'index'])->name('cors_colg.index');
       Route::post('college/filter',[App\Http\Controllers\Admin\CollegeCourseFilterController::class, 'filter'])->name('cors_colg.filter');
       
       Route::post('/apply',[App\Http\Controllers\Admin\CollegeCourseFilterController::class, 'apply'])->name('cors_colg.apply');

       //Filter by intake
       Route::get('course/filter/intake',[App\Http\Controllers\Admin\CollegeCourseFilterController::class, 'intake'])->name('intake.index');
       Route::post('course/filter/intake',[App\Http\Controllers\Admin\CollegeCourseFilterController::class, 'intakeFilter'])->name('intake.filter');

    });
    //Booking
    Route::middleware(['auth:admin', 'verified'])->group(static function () {
    Route::get('/package_booking', [App\Http\Controllers\Admin\BookingController::class, 'package_booking'])->name('package.booking');
    Route::get('/viewpackage_booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'viewpackage_booking'])->name('package.view.booking');
    Route::get('/delete_bookings/{id}', [App\Http\Controllers\Admin\BookingController::class, 'delete_bookings'])->name('delete_bookings');
    Route::get('/insurance_booking', [App\Http\Controllers\Admin\BookingController::class, 'insurance_booking'])->name('package.insurance_booking');
    Route::get('/viewinsurance_booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'viewinsurance_booking'])->name('package.view.insurance_booking');
    Route::get('/delete_insurance_booking/{id}', [App\Http\Controllers\Admin\BookingController::class, 'delete_insurance_booking'])->name('delete_bookings');

    });
});

