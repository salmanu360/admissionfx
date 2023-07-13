<?php

use App\Http\Controllers\Recruiter\GradingSchemeController;
use App\Http\Controllers\Recruiter\HighestLevelEducationController;
use App\Http\Controllers\RM\CollegeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Recruiter\SignaturePadController;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/story', [App\Http\Controllers\SiteController::class, 'story'])->name('story');
Route::get('/about-us', [App\Http\Controllers\SiteController::class, 'about'])->name('about');
Route::get('/career', [App\Http\Controllers\SiteController::class, 'career'])->name('career');
Route::get('/faq', [App\Http\Controllers\SiteController::class, 'faq'])->name('faq');
Route::get('/contact', [App\Http\Controllers\SiteController::class, 'contact'])->name('contact');
Route::get('/overseas-education-consultant-in-noida', [App\Http\Controllers\SiteController::class, 'students'])->name('students');
Route::get('/study-abroad-recruitment', [App\Http\Controllers\SiteController::class, 'recruiters'])->name('recruiters');
Route::get('/institutions', [App\Http\Controllers\SiteController::class, 'institutions'])->name('institutions');
Route::get('/privacy-and-cookies-policy', [App\Http\Controllers\SiteController::class, 'policy'])->name('policy');
Route::get('/refund-policy', [App\Http\Controllers\SiteController::class, 'refund'])->name('refund');
Route::get('/terms-and-conditions', [App\Http\Controllers\SiteController::class, 'terms'])->name('terms');

Route::get('/recruiters', [App\Http\Controllers\RecruiterController::class, 'index'])->name('frontend.recruiter.index');
Route::post('/recruiters/store', [App\Http\Controllers\RecruiterController::class, 'store'])->name('frontend.recruiter.store');
Route::get('/students/add', [App\Http\Controllers\StudentController::class, 'index'])->name('frontend.student.index');
Route::post('/students/store', [App\Http\Controllers\StudentController::class, 'store'])->name('frontend.student.store');

Route::get('/getStates/{id}', [App\Http\Controllers\Admin\StateController::class, 'getStates'])->name('states.getStates');
Route::get('/getState/{id}', [App\Http\Controllers\Admin\StateController::class, 'getState'])->name('states.getState');

//:::::::::::::::::::::countries universitie:::::::::::::::::://

Route::get('study-in-abroad', [App\Http\Controllers\SiteController::class, 'studyAbroad'])->name('frontend.study.abroad');
Route::get('study-in-australia', [App\Http\Controllers\SiteController::class, 'studyAUS'])->name('frontend.study.Australia');
Route::get('study-in-canada', [App\Http\Controllers\SiteController::class, 'studyCAN'])->name('frontend.study.canada');
Route::get('study-in-europe', [App\Http\Controllers\SiteController::class, 'studyEurope'])->name('frontend.study.europe');
Route::get('study-in-new-zeland', [App\Http\Controllers\SiteController::class, 'studyNZ'])->name('frontend.study.newZeland');
Route::get('study-in-united-kingdom', [App\Http\Controllers\SiteController::class, 'studyUK'])->name('frontend.study.unitedKingdom');
Route::get('study-in-usa', [App\Http\Controllers\SiteController::class, 'studyUSA'])->name('frontend.study.USAmerica');


// notification read at
Route::get('notification-read/{id}', [App\Http\Controllers\Admin\NotificationController::class, 'updateStatus'])->name('notification-read');

//:::::::::::::::::::::countries universitie:::::::::::::::::://


require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');
});


Route::middleware(['auth', 'role:manager'])->group(function(){
    Route::get('/manager/dashboard', [\App\Http\Controllers\Manager\ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
    
});

Route::middleware(['auth', 'role:rm'])->group(function(){
    Route::get('/rmanager/dashboard', [\App\Http\Controllers\RM\RMController::class, 'RMDashboard'])->name('rmanager.dashboard');
     Route::get('/assignRecruiterToRms', [App\Http\Controllers\RM\RMController::class,'rmrecruiter'])->name('rmmanager.recruiterrm');
     Route::get('/rmanager/report', [App\Http\Controllers\RM\ReportController::class,'index'])->name('rmmanager.report');
     
     //Country
      Route::get('rm/country', [App\Http\Controllers\RM\CountryController::class, 'country'])->name('countries.index');
        Route::get('rm/country/addCountry', [App\Http\Controllers\RM\CountryController::class, 'addCountry'])->name('countries.addCountry');
        Route::post('rm/country/storeCountry', [App\Http\Controllers\RM\CountryController::class, 'storeCountry'])->name('countries.storeCountry');
        Route::get('rm/country/editCountry/{id}', [App\Http\Controllers\RM\CountryController::class, 'editCountry'])->name('countries.editCountry');
        Route::post('rm/country/updateCountry/{id}', [App\Http\Controllers\RM\CountryController::class, 'updateCountry'])->name('countries.updateCountry');
        Route::get('rm/country/delete_country/{id}', [App\Http\Controllers\RM\CountryController::class, 'deleteCountry'])->name('countries/deleteCountry');
     
      //College
       Route::get('rm/college', [CollegeController::class, 'index'])->name('colleges.index');
       Route::get('rm/college/create', [CollegeController::class, 'create'])->name('colleges.create');
       Route::post('rm/college/store', [App\Http\Controllers\RM\CollegeController::class, 'store'])->name('colleges.store');
       Route::get('rm/college/edit/{id}', [App\Http\Controllers\RM\CollegeController::class, 'editCollege'])->name('editColleges');
       Route::post('rm/college/update/{id}', [App\Http\Controllers\RM\CollegeController::class, 'updateCollege'])->name('colleges.updateColleges');
       Route::get('rm/college/delete_college/{id}', [App\Http\Controllers\RM\CollegeController::class, 'deleteCollege'])->name('deleteColleges');
        Route::get('rm/college/getDetail/{id}', [App\Http\Controllers\RM\CollegeController::class, 'getDetail'])->name('colleges.getDetail');

       //Course
       Route::get('rm/course', [App\Http\Controllers\RM\CourseController::class, 'index'])->name('courses.index');
       Route::get('rm/course/create', [App\Http\Controllers\RM\CourseController::class, 'create'])->name('courses.create');
       Route::post('rm/course/store', [App\Http\Controllers\RM\CourseController::class, 'store'])->name('courses.store');
       Route::get('rm/course/edit/{id}', [App\Http\Controllers\RM\CourseController::class, 'edit'])->name('courses.edit');
       Route::post('rm/course/update/{id}', [App\Http\Controllers\RM\CourseController::class, 'update'])->name('courses.update');
       Route::get('rm/course/destroy/{id}', [App\Http\Controllers\RM\CourseController::class, 'destroy'])->name('courses.destroy');
       Route::get('rm/course/getDetail/{id}', [App\Http\Controllers\RM\CourseController::class, 'getDetail'])->name('courses.getDetail');

       //student
       Route::get('rm/student', [App\Http\Controllers\RM\StudentController::class, 'index'])->name('students.index');
        Route::get('rm/student/downloadFile/{file}/{type}', [App\Http\Controllers\RM\StudentController::class, 'downloadFile'])->name('students.downloadFile');
       Route::get('rm/student/getDetail/{id}', [App\Http\Controllers\RM\StudentController::class, 'getDetail'])->name('students.getDetail');
       Route::get('rm/student/getDocument/{id}', [App\Http\Controllers\RM\StudentController::class, 'getDocument'])->name('students.getDocument');
       Route::get('rm/student/create', [App\Http\Controllers\RM\StudentController::class, 'create'])->name('students.create');
       Route::post('rm/student/store', [App\Http\Controllers\RM\StudentController::class, 'store'])->name('students.store');
       Route::get('rm/student/edit/{id}', [App\Http\Controllers\RM\StudentController::class, 'edit'])->name('students.edit');
       Route::post('rm/student/update/{id}', [App\Http\Controllers\RM\StudentController::class, 'update'])->name('students.update');
       Route::get('rm/student/destroy/{id}', [App\Http\Controllers\RM\StudentController::class, 'destroy'])->name('students.destroy');
       Route::PUT('rm/student/team/assign/{id}', [App\Http\Controllers\RM\StudentController::class, 'applicationTeam'])->name('students.team.assign');
       Route::put('rm/student/password/change/{id}', [App\Http\Controllers\RM\StudentController::class, 'changePassword'])->name('students.password');
       Route::get('/rm/student/rmUnlockRequest/{id}', [App\Http\Controllers\RM\StudentController::class, 'rmUnlockRequest'])->name('student.rmUnlockRequest');
        //recruiter
       Route::get('rm/recruiter', [App\Http\Controllers\RM\RecruiterController::class, 'index'])->name('recruiters.index');
       Route::get('rm/recruiter/downloadFile/{file}/{type}', [App\Http\Controllers\RM\RecruiterController::class, 'downloadFile'])->name('recruiters.downloadFile');
       Route::get('rm/recruiter/getDetail/{id}', [App\Http\Controllers\RM\RecruiterController::class, 'getDetail'])->name('recruiters.getDetail');
       Route::get('rm/recruiter/getDocument/{id}', [App\Http\Controllers\RM\RecruiterController::class, 'getDocument'])->name('recruiters.getDocument');
       Route::get('rm/recruiter/create', [App\Http\Controllers\RM\RecruiterController::class, 'create'])->name('recruiters.create');
       Route::post('rm/recruiter/store', [App\Http\Controllers\RM\RecruiterController::class, 'store'])->name('recruiters.store');
       Route::get('rm/recruiter/edit/{id}', [App\Http\Controllers\RM\RecruiterController::class, 'edit'])->name('recruiters.edit');
       Route::post('rm/recruiter/update/{id}', [App\Http\Controllers\RM\RecruiterController::class, 'update'])->name('recruiters.update');
       Route::get('rm/recruiter/destroy/{id}', [App\Http\Controllers\RM\RecruiterController::class, 'destroy'])->name('recruiters.destroy');
       Route::put('rm/recruiter/password/change/{id}', [App\Http\Controllers\RM\RecruiterController::class, 'changePassword'])->name('recruiters.password');
       
       //add notes for recruiter
        Route::post('/add/notes', [App\Http\Controllers\Admin\RecruiterNotesController::class, 'addNotes'])->name('rec.addNotes'); 

         //profile
         Route::get('/rm/profile', [\App\Http\Controllers\RM\RMController::class, 'profile'])->name('rm.profile');
         Route::put('/rm/profile/{id}', [\App\Http\Controllers\RM\RMController::class, 'updateProfile'])->name('rm.updateProfile');
         
         
                 //upload excel file
        Route::get('/college/uploadexcel', [App\Http\Controllers\RM\CollegeController::class, 'uploadexcel'])->name('colleges.uploadexcel');
        Route::post('/college/uploadexcelcsv', [App\Http\Controllers\RM\CollegeController::class, 'uploadexcelcsv'])->name('colleges.uploadexcelcsv');

        Route::get('/course/uploadexcel', [App\Http\Controllers\RM\CourseController::class, 'uploadexcel'])->name('courses.uploadexcel');
        Route::post('/course/uploadexcelcsv', [App\Http\Controllers\RM\CourseController::class, 'uploadexcelcsv'])->name('courses.uploadexcelcsv');

        Route::get('/recruiter/uploadexcel', [App\Http\Controllers\RM\RecruiterController::class, 'uploadexcel'])->name('recruiters.uploadexcel');
        Route::post('/recruiter/uploadexcelcsv', [App\Http\Controllers\RM\RecruiterController::class, 'uploadexcelcsv'])->name('recruiters.uploadexcelcsv');

        Route::get('/student/uploadexcel', [App\Http\Controllers\RM\StudentController::class, 'uploadexcel'])->name('students.uploadexcel');
        Route::post('/student/uploadexcelcsv', [App\Http\Controllers\RM\StudentController::class, 'uploadexcelcsv'])->name('students.uploadexcelcsv');

});

Route::middleware(['auth', 'role:application'])->group(function(){
    Route::get('/application/dashboard', [\App\Http\Controllers\Application\ApplicationController::class, 'ApplicationDashboard'])->name('application.dashboard');
    Route::get('/application', [App\Http\Controllers\Application\ApplicationController::class, 'application'])->name('application.index');
    Route::get('/application1/{id}', [App\Http\Controllers\Application\ApplicationController::class, 'application1'])->name('application.application1');
    Route::get('/showstudent/{id}', [App\Http\Controllers\Application\ApplicationController::class, 'showstudent'])->name('application.showstudent');
    Route::get('/totalstudent', [App\Http\Controllers\Application\ApplicationController::class, 'totalstudent'])->name('application.totalstudent');
    Route::get('/application/student', [App\Http\Controllers\Application\StudentController::class, 'index'])->name('appStudent.index');
    
    Route::get('/application/recruiterdetail/{id}', [App\Http\Controllers\Application\ApplicationController::class, 'recruiterdetail'])->name('application.recruiterdetail');
    
    Route::post('/application/student/document', [App\Http\Controllers\Application\StudentPendingDocumentController::class, 'studentDocument'])->name('application.document');
    Route::post('/application/student/status', [App\Http\Controllers\Application\StudentPendingDocumentController::class, 'leadStatusChange'])->name('application.changeLeadStatus');

    Route::get('/students/downloadFiles/{file}/{type}', [App\Http\Controllers\Application\StudentController::class, 'downloadFile'])->name('students.downloadFiles');
    Route::get('/students/downloadAll/{id}', [App\Http\Controllers\Application\StudentController::class, 'downloadFileAll'])->name('students.downloadFilesAll');

    Route::get('/lead', [App\Http\Controllers\Application\ApplicationController::class, 'lead'])->name('application.lead');
    Route::get('application/recruiter', [App\Http\Controllers\Application\ApplicationController::class, 'recruiter'])->name('application.recruiter');
    
      //add notes for student
         Route::post('application/student/notes/eligible', [App\Http\Controllers\Admin\StudentNotesController::class, 'addNotes'])->name('application.student.addNotes');
         Route::post('application/student/notes', [App\Http\Controllers\Admin\StudentNotesController::class, 'notStudentNotes'])->name('application.studentNot.addNotes');
    
     //profile
     Route::get('/application/profile', [\App\Http\Controllers\Application\ApplicationController::class, 'profile'])->name('application.profile');
     Route::put('/application/profile/{id}', [\App\Http\Controllers\Application\ApplicationController::class, 'updateProfile'])->name('application.updateProfile');

});

Route::middleware(['auth', 'role:student'])->group(function(){
    Route::get('/student/dashboard', [\App\Http\Controllers\Student\StudentController::class, 'StudentDashboard'])->name('student.dashboard');
    Route::get('student/profile', [\App\Http\Controllers\Student\StudentController::class, 'profile'])->name('student.profile');
    Route::put('student/profile/{id}', [\App\Http\Controllers\Student\StudentController::class, 'updateProfile'])->name('student.updateProfile');
});

Route::middleware(['auth', 'role:recruiter'])->group(function(){
    Route::get('/recruiter/dashboard', [\App\Http\Controllers\Recruiter\RecruiterController::class, 'RecruiterDashboard'])->name('recruiter.dashboard');
    
    //recruiter
    Route::get('/recruiter', [App\Http\Controllers\Recruiter\RecruiterController::class, 'index'])->name('rec.index');
    Route::get('/recruiter/downloadFile/{file}/{type}', [App\Http\Controllers\Recruiter\RecruiterController::class, 'downloadFile'])->name('rec.downloadFile');
        Route::get('/recruiter/getDetail/{id}', [App\Http\Controllers\Recruiter\RecruiterController::class, 'getDetail'])->name('rec.getDetail');
        Route::get('/recruiter/getDocument/{id}', [App\Http\Controllers\Recruiter\RecruiterController::class, 'getDocument'])->name('rec.getDocument');
        Route::get('/recruiter/create', [App\Http\Controllers\Recruiter\RecruiterController::class, 'create'])->name('rec.create');
        Route::post('/recruiter/store', [App\Http\Controllers\Recruiter\RecruiterController::class, 'store'])->name('rec.store');
        Route::get('/recruiter/edit/{id}', [App\Http\Controllers\Recruiter\RecruiterController::class, 'edit'])->name('rec.edit');
        Route::post('/recruiter/update/{id}', [App\Http\Controllers\Recruiter\RecruiterController::class, 'update'])->name('rec.update');
        Route::get('/recruiter/destroy/{id}', [App\Http\Controllers\Recruiter\RecruiterController::class, 'destroy'])->name('rec.destroy');
        Route::get('/assignRecruiterToRm', [App\Http\Controllers\Recruiter\AssignRecruiterToRmController::class,'recruiterrm'])->name('rec.recruiterrm');
        Route::put('/recruiter/password/change/{id}', [App\Http\Controllers\Recruiter\RecruiterController::class, 'changePassword'])->name('rec.password');

        //student
        Route::get('/student', [App\Http\Controllers\Recruiter\StudentController::class, 'index'])->name('std.index');
         Route::get('/student/downloadFile/{file}/{type}', [App\Http\Controllers\Recruiter\StudentController::class, 'downloadFile'])->name('std.downloadFile');
        Route::get('/student/getDetail/{id}', [App\Http\Controllers\Recruiter\StudentController::class, 'getDetail'])->name('std.getDetail');
        Route::get('/student/getDocument/{id}', [App\Http\Controllers\Recruiter\StudentController::class, 'getDocument'])->name('std.getDocument');
        Route::get('/student/create', [App\Http\Controllers\Recruiter\StudentController::class, 'create'])->name('std.create');
        Route::post('/student/store', [App\Http\Controllers\Recruiter\StudentController::class, 'store'])->name('std.store');
        Route::get('/student/edit/{id}', [App\Http\Controllers\Recruiter\StudentController::class, 'edit'])->name('std.edit');
        Route::post('/student/update/{id}', [App\Http\Controllers\Recruiter\StudentController::class, 'update'])->name('std.update');
        Route::get('/student/destroy/{id}', [App\Http\Controllers\Recruiter\StudentController::class, 'destroy'])->name('std.destroy');
        Route::PUT('/student/team/assign/{id}', [App\Http\Controllers\Recruiter\StudentController::class, 'applicationTeam'])->name('std.team.assign');
        Route::put('/student/password/change/{id}', [App\Http\Controllers\Recruiter\StudentController::class, 'changePassword'])->name('std.password');

         //grading scheme
         Route::get('/grading/scheme', [GradingSchemeController::class, 'index'])->name('grad.index');
         Route::post('/grading/scheme/create', [GradingSchemeController::class, 'create'])->name('grad.create');
         Route::put('/grading/scheme/update/{id}', [GradingSchemeController::class, 'update'])->name('grad.update');
         Route::get('/grading/destroy/{id}', [GradingSchemeController::class, 'destroy'])->name('grad.destroy');
 
         //highest level education
         Route::get('/education/level', [HighestLevelEducationController::class, 'index'])->name('edu.index');
         Route::post('/education/level/create', [HighestLevelEducationController::class, 'create'])->name('edu.create');
         Route::put('/education/level/update/{id}', [HighestLevelEducationController::class, 'update'])->name('edu.update');
         Route::get('/education/destroy/{id}', [HighestLevelEducationController::class, 'destroy'])->name('edu.destroy');

         //College
        Route::get('/college', [App\Http\Controllers\Recruiter\CollegeController::class, 'index'])->name('colg.index');
        Route::get('/college/create', [App\Http\Controllers\Recruiter\CollegeController::class, 'create'])->name('colg.create');
        Route::post('/college/store', [App\Http\Controllers\Recruiter\CollegeController::class, 'store'])->name('colg.store');
        Route::get('/college/edit/{id}', [App\Http\Controllers\Recruiter\CollegeController::class, 'editCollege'])->name('colg.edit');
        Route::post('/college/update/{id}', [App\Http\Controllers\Recruiter\CollegeController::class, 'updateCollege'])->name('colg.update');
        Route::get('/college/delete_college/{id}', [App\Http\Controllers\Recruiter\CollegeController::class, 'deleteCollege'])->name('colg.delete');
         Route::get('/college/getDetail/{id}', [App\Http\Controllers\Recruiter\CollegeController::class, 'getDetail'])->name('colg.getDetail');

        //Course
        Route::get('/course', [App\Http\Controllers\Recruiter\CourseController::class, 'index'])->name('cors.index');
        Route::get('/course/create', [App\Http\Controllers\Recruiter\CourseController::class, 'create'])->name('cors.create');
        Route::post('/course/store', [App\Http\Controllers\Recruiter\CourseController::class, 'store'])->name('cors.store');
        Route::get('/course/edit/{id}', [App\Http\Controllers\Recruiter\CourseController::class, 'edit'])->name('cors.edit');
        Route::post('/course/update/{id}', [App\Http\Controllers\Recruiter\CourseController::class, 'update'])->name('cors.update');
        Route::get('/course/destroy/{id}', [App\Http\Controllers\Recruiter\CourseController::class, 'destroy'])->name('cors.destroy');
         Route::get('/course/getDetail/{id}', [App\Http\Controllers\Recruiter\CourseController::class, 'getDetail'])->name('cors.getDetail');


        //college to courses
        Route::get('/courses/{id}',[App\Http\Controllers\Recruiter\CourseController::class, 'collegeDetail'])->name('college.course');
        Route::post('/apply/course/{id}',[App\Http\Controllers\Recruiter\StudentApplyController::class, 'studentApply'])->name('std.applyCourse');
        
         //College & Course Filter
        Route::get('/filter',[App\Http\Controllers\Recruiter\CollegeCourseFilterController::class, 'index'])->name('rec.cors_colg.index');
        Route::post('/filter',[App\Http\Controllers\Recruiter\CollegeCourseFilterController::class, 'filter'])->name('rec.cors_colg.filter');
        Route::post('/apply',[App\Http\Controllers\Recruiter\CollegeCourseFilterController::class, 'apply'])->name('rec.cors_colg.apply');
        
        //Filter by intake
        Route::get('/filter/intake',[App\Http\Controllers\Recruiter\CollegeCourseFilterController::class, 'intake'])->name('rec.intake.index');
        Route::post('/filter/intake',[App\Http\Controllers\Recruiter\CollegeCourseFilterController::class, 'intakeFilter'])->name('rec.intake.filter');
        
        //profile
        Route::get('/recruiter/profile', [\App\Http\Controllers\Recruiter\RecruiterController::class, 'profile'])->name('recruiter.profile');
        Route::put('/recruiter/profile/{id}', [\App\Http\Controllers\Recruiter\RecruiterController::class, 'updateProfile'])->name('recruiter.updateProfile');
        Route::get('/recruiter/mou', [\App\Http\Controllers\Recruiter\RecruiterController::class, 'mou'])->name('recruiter.mou');

        Route::post('signaturepad', [SignaturePadController::class, 'upload'])->name('signaturepad.upload');
        Route::post('signaturefile', [SignaturePadController::class, 'uploadFile'])->name('upload.mouSignature');
         Route::post('/moutopdf', [App\Http\Controllers\Recruiter\SignaturePadController::class, 'textToPdf'])->name('recruiter.moutopdf');
        
        Route::get('/application', [App\Http\Controllers\Recruiter\ApplicationController::class, 'index'])->name('rec.application');

});

// Logout route
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('role.logout');


