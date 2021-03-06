<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('dashboardRedirect')->name('dashboard');

require __DIR__.'/auth.php';

Route::view('register', 'registerlogin')->name('register');

Route::view('login', 'registerlogin')->name('login');

Route::group(['middleware'=>'auth'], function(){

    Route::view('admin/teacher', 'displayTeacher')->name('teacher')->middleware('admin');
    Route::view('admin/course', 'displayCourses')->name('course')->middleware('admin');
    Route::view('admin/student', 'displayStudent')->name('student')->middleware('admin');
    Route::view('admin/schedule', 'displaySchedule')->name('schedule')->middleware('admin');
    
    Route::view('student/teacher', 'assignTeacher')->name('student.teacher')->middleware('student');
    
    Route::view('teacher/schedule', 'showSchedule')->name('teacher.schedule')->middleware('teacher');

});

Route::get('logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
