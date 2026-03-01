<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::namespace('Admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function(){
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login')->name('excute.login');
        Route::post('/logout','LoginController@logout')->name('logout');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::name('account.')->group(function(){
            Route::get('/account/profile','AccountController@showFormUpdateProfile')->name('edit-profile');
            Route::post('/account/profile','AccountController@updateProfile')->name('update-profile');
        
            Route::get('/account/password','AccountController@showFormUpdatePassword')->name('edit-password');
            Route::post('/account/password','AccountController@updatePassword')->name('update-password');
        });

        Route::middleware('isManager')->group(function () {

            Route::name('course.')->group(function(){
                Route::get('/courses','CourseController@index')->name('index');
                Route::get('/courses/create','CourseController@create')->name('add');
                Route::get('/courses/edit/{course}','CourseController@edit')->name('edit');

                Route::post('/courses','CourseController@store')->name('store');
                Route::post('/courses/edit/{course}','CourseController@update')->name('update');
                Route::get('/courses/delete/{course}','CourseController@destroy')->name('delete');
            });

            Route::name('class.')->group(function(){
                Route::get('/classes','ClassController@index')->name('index');
                Route::get('/classes/create','ClassController@create')->name('add');
                Route::get('/classes/edit/{class}','ClassController@edit')->name('edit');

                Route::post('/classes','ClassController@store')->name('store');
                Route::post('/classes/edit/{class}','ClassController@update')->name('update');
                Route::get('/classes/delete/{class}','ClassController@destroy')->name('delete');
            });

            Route::name('lesson.')->group(function(){
                Route::get('/lessons','LessonController@index')->name('index');
                Route::get('/lessons/create','LessonController@create')->name('add');
                Route::get('/lessons/show/{lesson}','LessonController@show')->name('show');
                Route::get('/lessons/edit/{lesson}','LessonController@edit')->name('edit');

                Route::post('/lessons','LessonController@store')->name('store');
                Route::post('/lessons/edit/{lesson}','LessonController@update')->name('update');
                Route::get('/lessons/delete/{lesson}','LessonController@destroy')->name('delete');
            });

            Route::name('question.')->group(function(){
                Route::get('/questions','QuestionController@index')->name('index');
                Route::get('/questions/show/exam/{exam}','QuestionController@showExam')->name('show.exam');
                Route::get('/questions/create','QuestionController@create')->name('add');
                Route::get('/questions/edit/{question}','QuestionController@edit')->name('edit');

                Route::post('/questions','QuestionController@store')->name('store');
                Route::post('/questions/edit/{question}','QuestionController@update')->name('update');
                Route::get('/questions/delete/{question}','QuestionController@destroy')->name('delete');

                // import Excel Or CSV
                Route::get('/questions/import','QuestionController@showImportForm')->name('import');
                Route::post('/question/import','QuestionController@import')->name('import.store');

                Route::get('/questions/export','QuestionController@export')->name('export');
            });

            Route::name('student.')->group(function(){
                Route::get('/students','StudentController@index')->name('index.manager');
                Route::get('/students/{user}','StudentController@show')->name('show');
                Route::get('/students/delete/{user}' , 'StudentController@destroy')->name('destroy');

                Route::get('/studentRegister/allow/{user}','StudentController@allow')->name('allow');
                Route::get('/studentRegister/refuse/{user}','StudentController@refuse')->name('refuse');
            });

            Route::name('exam.')->group(function(){
                Route::get('/exams','ExamController@index')->name('index');
                Route::get('/exams/edit/{exam}','ExamController@edit')->name('edit');

                Route::get('/exams/changeStatus/{exam}','ExamController@changeStatus')->name('update.status');

                Route::post('/exams/edit/{exam}','ExamController@update')->name('update');
            });

            Route::namespace('Notification')->name('notification.')->group(function () {

                Route::get('/notifications','HomeController@index')->name('index');

                Route::get('/notifications/private/create','NotePrivateController@create')->name('private.add');
                Route::get('/notifications/private/edit/{notification}','NotePrivateController@edit')->name('private.edit');

                Route::get('/notifications/general/create','NoteGeneralController@create')->name('general.add');
                Route::get('/notifications/general/edit/{notification}','NoteGeneralController@edit')->name('general.edit');

                Route::post('/notifications/private/create','NotePrivateController@store')->name('private.store');
                Route::post('/notifications/private/edit/{notification}','NotePrivateController@update')->name('private.update');

                Route::post('/notifications/general/create','NoteGeneralController@store')->name('general.store');
                Route::post('/notifications/general/edit/{notification}','NoteGeneralController@update')->name('general.update');

                Route::get('/notifications/general/delete/{notification}','NoteGeneralController@delete')->name('general.delete');
                Route::get('/notifications/private/delete/{notification}','NotePrivateController@delete')->name('private.delete');
                
            });

        });

        Route::middleware('isAdmin')->group(function () {

            Route::name('manager.')->group(function(){
                Route::get('/managers','ManageController@index')->name('index');
                Route::get('/managers/create','ManageController@create')->name('add');
                Route::get('/managers/edit/{admin}','ManageController@edit')->name('edit');
    
                Route::post('/manager','ManageController@store')->name('store');
                Route::post('/manager/edit/{admin}','ManageController@update')->name('update');
                Route::get('/manager/delete/{admin}','ManageController@destroy')->name('delete');
            });

        });

    });
});