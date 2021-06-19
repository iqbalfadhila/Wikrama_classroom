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
Auth::routes([
    'register' => false
]);

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('/');
        }
    }

    return redirect()->route('login');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function(){
    Route::get('/home', 'AdminController@index')->name('home');

    Route::resource('teacher', 'TeacherController');
    Route::get('/exportteacher', 'TeacherController@teacherexport')->name('exportteacher');
    
    Route::resource('student', 'StudentController');
    
    Route::resource('supervisor', 'SupervisorController');

    Route::resource('lesson', 'LessonController');
    
    Route::resource('rombel', 'RombelController');

    Route::resource('majors', 'MajorsController');

    Route::resource('rayon', 'RayonController');

});

Route::prefix('teacher')->name('teacher.')->middleware('auth', 'role:teacher')->group(function(){
    Route::get('/dashboard', 'TaskController@dashboard')->name('dashboard');

    Route::resource('task', 'TaskController');

});
// Route::prefix('teacher')->group(function(){
//     Route::resource('task', 'TaskController');

// });

Route::prefix('student')->group(function(){
    Route::resource('collect', 'CollectController');

});

