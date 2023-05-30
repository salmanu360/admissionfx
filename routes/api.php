<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [\App\Http\Controllers\ApiController::class, 'login']);
Route::post('register', [\App\Http\Controllers\ApiController::class, 'register']);
Route::post('registerrecruiter', [\App\Http\Controllers\ApiController::class, 'registerRecruiter']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    //Student routes
 
    Route::post('logout', [\App\Http\Controllers\ApiController::class, 'logout']);

    
    //Recruiter routes
    Route::prefix('recruiter')->group(function () {
        Route::post('logout', [\App\Http\Controllers\ApiController::class, 'logout']);
        Route::get('/getColleges', [\App\Http\Controllers\ApiRecruiterController::class, 'getColleges']);
        Route::get('/getCourses', [\App\Http\Controllers\ApiRecruiterController::class, 'getCourses']);
        Route::get('/getStudents', [\App\Http\Controllers\ApiRecruiterController::class, 'getStudents']);
        Route::get('/getCountries', [\App\Http\Controllers\ApiRecruiterController::class, 'getCountries']);
        Route::get('/getCities', [\App\Http\Controllers\ApiRecruiterController::class, 'getCities']);
        Route::get('/getStates', [\App\Http\Controllers\ApiRecruiterController::class, 'getStates']);
        Route::get('/getLevels', [\App\Http\Controllers\ApiRecruiterController::class, 'getLevels']);
        Route::get('/getGradings', [\App\Http\Controllers\ApiRecruiterController::class, 'getGradings']);
        Route::get('/getApplications', [\App\Http\Controllers\ApiRecruiterController::class, 'getApplications']);
        Route::post('/filterColleges', [\App\Http\Controllers\ApiRecruiterController::class, 'filterColleges']);
        Route::post('/filterCourses', [\App\Http\Controllers\ApiRecruiterController::class, 'filterCourses']);
    });

});
