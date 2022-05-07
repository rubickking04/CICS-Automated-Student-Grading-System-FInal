<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Teacher\GradeController;
use App\Http\Controllers\UserGradeExportController;
use App\Http\Controllers\Admin\StudentTableController;
use App\Http\Controllers\Admin\TeacherTableController;
use App\Http\Controllers\Admin\SearchTeacherController;
use App\Http\Controllers\Admin\StudentProfileController;
use App\Http\Controllers\Admin\TeacherProfileController;
use App\Http\Controllers\Admin\StudentRegisterController;
use App\Http\Controllers\Admin\TeacherRegisterController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'prevent-back-history'],function(){
    Auth::routes();
    Route::post('/sign-in', [App\Http\Controllers\Auth\LoginController::class, 'store'])->name('sign-in');
    Route::middleware('auth')->group( function(){
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/grades', [App\Http\Controllers\UserGradeExportController::class, 'index'])->name('grade');
        Route::get('/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
        Route::get('/download/{id}', [App\Http\Controllers\UserGradeExportController::class, 'export'])->name('export');
        Route::get('/pdf/{id}', [App\Http\Controllers\UserGradeExportController::class, 'viewPdf'])->name('viewPdf');
        Route::get('/my-subjects', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject');
        Route::post('/class', [App\Http\Controllers\SubjectController::class, 'store'])->name('class');
        Route::get('/subject/{lesson:uuid}', [App\Http\Controllers\ClassController::class, 'index'])->name('my-class');
    });
    Route::namespace('admin')->prefix('admin')->group( function(){
        Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
        Route::middleware('auth:admin')->group(function(){
            Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
            Route::get('/register', [App\Http\Controllers\Admin\StudentRegisterController::class, 'index'])->name('admin.register');
            Route::get('/student', [App\Http\Controllers\Admin\StudentTableController::class, 'index'])->name('admin.student.tables');
            Route::post('/student/updates/{id}', [App\Http\Controllers\Admin\StudentTableController::class, 'update'])->name('admin.student.update');
            Route::get('/student/search', [App\Http\Controllers\Admin\StudentTableController::class, 'search'])->name('admin.searchStudent');
            Route::get('/student/{id}', [App\Http\Controllers\Admin\StudentTableController::class, 'destroy'])->name('admin.student.destroy');
            Route::get('/teacher/search', [App\Http\Controllers\Admin\SearchController::class, 'search'])->name('admin.search');
            Route::get('/teacher/destroy/{id}', [App\Http\Controllers\Admin\TeacherTableController::class, 'destroy'])->name('admin.teacher.destroy');
            Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
            Route::get('/teacher/sign-up',[App\Http\Controllers\Admin\TeacherRegisterController::class, 'index'])->name('admin.teacher.register');
            Route::post('/teacher/updates/{id}', [App\Http\Controllers\Admin\TeacherTableController::class, 'update'])->name('admin.teacher.update');
            Route::post('/teacher/store',[App\Http\Controllers\Admin\TeacherRegisterController::class, 'store'])->name('admin.teacher.store');
            Route::get('/teacher', [App\Http\Controllers\Admin\TeacherTableController::class, 'index'])->name('admin.teacher.tables');
            Route::get('/subject', [App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('admin.subject.tables');
            Route::get('/subject/{subjects:uuid}', [App\Http\Controllers\Admin\SubjectDataController::class, 'index'])->name('admin.subject.data');
            Route::get('/subject/delete/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'destroy'])->name('admin.subject.destroy');
            Route::post('/subject/update/{id}', [App\Http\Controllers\Admin\SubjectDataController::class, 'update'])->name('admin.grade.update');
            Route::get('/subject/search', [App\Http\Controllers\Admin\SearchController::class, 'searchSubject'])->name('admin.search.subjects');
        });
    });
    Route::namespace('teacher')->prefix('teacher')->group( function(){
        Route::get('/login', [App\Http\Controllers\Teacher\LoginController::class, 'showLoginForm'])->name('teacher.login');
        Route::post('/login', [App\Http\Controllers\Teacher\LoginController::class, 'login'])->name('teacher.login');
        Route::middleware('auth:teacher')->group(function(){
            Route::get('/home', [App\Http\Controllers\Teacher\HomeController::class, 'index'])->name('teacher.home');
            Route::get('/subject', [App\Http\Controllers\Teacher\SubjectController::class, 'index'])->name('teacher.subject');
            Route::get('/class/{subjects:uuid}', [App\Http\Controllers\Teacher\ClassController::class, 'index'])->name('teacher.class');
            Route::post('/grades/store/{id}', [App\Http\Controllers\Teacher\GradeController::class, 'store'])->name('teacher.grade.store');
            Route::get('/grades/destroy/{id}', [App\Http\Controllers\Teacher\GradeController::class, 'destroy'])->name('teacher.grade.destroy');
            Route::get('/class/destroy/{id}', [App\Http\Controllers\Teacher\ClassController::class, 'destroy'])->name('teacher.class.destroy');
            Route::post('/store', [App\Http\Controllers\Teacher\SubjectController::class, 'store'])->name('teacher.store');
            Route::post('/logout', [App\Http\Controllers\Teacher\LoginController::class, 'logout'])->name('teacher.logout');
        });
    });
});
