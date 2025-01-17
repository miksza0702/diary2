<?php

use Illuminate\Support\Facades\Route;

Route::middleware( ['auth', 'roles:admin'] )->group( static function(){

    Route::group( [ 'prefix' => 'dashboard' ], function(){

        Route::group( [ 'prefix' => 'users' ], function(){

            Route::get( '/', [
                'uses' => 'UserController@index'
            ] )->name( 'users.index' );

            Route::get( '/create', [
                'uses' => 'UserController@create'
            ] )->name( 'users.create' );

            Route::post( '/create', [
                'uses' => 'UserController@store'
            ] )->name( 'users.store' );

            Route::get( '/edit/{user}', [
                'uses' => 'UserController@edit'
            ] )->name( 'users.edit' );

            Route::post( '/update', [
                'uses' => 'UserController@update'
            ] )->name( 'users.update' );

            Route::post( '/checkEmail', [
                'uses' => 'UserController@checkEmail'
            ] )->name( 'users.checkEmail' );

            Route::delete( '/', [
                'uses' => 'UserController@delete'
            ] )->name( 'users.delete' );

            Route::get( '/{id}/status/{status}/type/{type}', [
                'uses' => 'UserController@status'
            ] )->name( 'users.status' );

        } );

        Route::group( [ 'prefix' => 'students' ], function(){

            Route::get( '/', [
                'uses' => 'StudentController@index'
            ] )->name( 'students.index' );

            Route::get( '/class/{class_id}', [
                'uses' => 'StudentController@index'
            ] )->name( 'students.class.index' )->where('class_id', '[0-9]+');

            Route::get('/notes/{class_id}', [
                'uses' => 'StudentController@notes'
            ]) -> name('students.class.notes');

            Route::get( '/create', [
                'uses' => 'StudentController@create'
            ] )->name( 'students.create' );

            Route::post( '/create', [
                'uses' => 'StudentController@store'
            ] )->name( 'students.store' );

            Route::get( '/edit/{user}', [
                'uses' => 'StudentController@edit'
            ] )->name( 'students.edit' );

            Route::get( '/show/{id}', [
                'uses' => 'StudentController@show'
            ] )->name( 'student.show' );

            Route::post( '/update', [
                'uses' => 'StudentController@update'
            ] )->name( 'students.update' );

            Route::post( '/panel', [
                'uses' => 'StudentController@getPanel'
            ] )->name( 'students.panel' );

            Route::get( '/parents/{user}', [
                'uses' => 'ParentController@index'
            ] )->name( 'students.parents' );

            Route::delete( '/parents', [
                'uses' => 'ParentController@deleteParent'
            ] )->name( 'students.parents.delete' );

            Route::put( '/parents', [
                'uses' => 'ParentController@addParent'
            ] )->name( 'students.parents.add' );

        } );

        Route::group( [ 'prefix' => 'plan' ], function(){

            Route::get( '/{class_id}', [
                'uses' => 'PlanMonthController@index'
            ] )->name( 'plan.month.index' );

            Route::get( '/day/class/{class_id}/{year}/{month}/{day}', [
                'uses' => 'PlanDayController@index'
            ] )->name( 'plan.day.index' );

            Route::get( '/day/presences/{class_id}/{lesson_id}', [
                'uses' => 'PresencesController@index'
            ] )->name( 'plan.presences.index' );

            Route::post( 'presents/save', [
                'uses' => 'PresencesController@saveStatus'
            ] )->name( 'presents.save' );

        } );

        Route::group( [ 'prefix' => 'teachers' ], function(){

            Route::get( '/', [
                'uses' => 'TeacherController@index'
            ] )->name( 'teachers.index' );

            Route::get( '/create', [
                'uses' => 'TeacherController@create'
            ] )->name( 'teachers.create' );

            Route::post( '/create', [
                'uses' => 'TeacherController@store'
            ] )->name( 'teachers.store' );

            Route::get( '/edit/{user}', [
                'uses' => 'TeacherController@edit'
            ] )->name( 'teachers.edit' );

            Route::post( '/update', [
                'uses' => 'TeacherController@update'
            ] )->name( 'teachers.update' );

        } );

        Route::group( [ 'prefix' => 'classes' ], function(){

            Route::get( '/', [
                'uses' => 'ClassController@index'
            ] )->name( 'classes.index' );

            Route::get( '/create', [
                'uses' => 'ClassController@create'
            ] )->name( 'classes.create' );

            Route::post( '/create', [
                'uses' => 'ClassController@store'
            ] )->name( 'classes.store' );

            Route::get( '/edit/{class}', [
                'uses' => 'ClassController@edit'
            ] )->name( 'classes.edit' );

            Route::post( '/update', [
                'uses' => 'ClassController@update'
            ] )->name( 'classes.update' );

            Route::delete( '/', [
                'uses' => 'ClassController@delete'
            ] )->name( 'classes.delete' );

            Route::put( '/students', [
                'uses' => 'ClassController@addStudent'
            ] )->name( 'class.student.add' );

            Route::delete( '/students', [
                'uses' => 'ClassController@removeStudent'
            ] )->name( 'class.student.remove' );

        } );


        Route::group( [ 'prefix' => 'notes' ], function(){

            Route::get( '/', [
                'uses' => 'NotesController@index'
            ] )->name( 'notes.index' );
            Route::get( '/create', [
                'uses' => 'NotesController@create'
            ] )->name( 'notes.create' );
            Route::post( '/create', [
                'uses' => 'NotesController@store'
            ] )->name( 'notes.store' );
            Route::get( '/edit/{note}', [
                'uses' => 'NotesController@edit'
            ] )->name( 'notes.edit' );
            Route::delete( '/', [
                'uses' => 'NotesController@delete'
            ] )->name( 'notes.delete' );
            Route::post( '/update', [
                'uses' => 'NotesController@update'
            ] )->name('notes.update');

            Route::get( '/class/{class_id}', [
                'uses' => 'StudentController@notes'
            ] )->name( 'students.class.notes' );

        } );

        Route::group( [ 'prefix' => 'grades' ], function(){

            Route::get( '/', [
                'uses' => 'GradeController@index'
            ] )->name( 'grades.index' );

            Route::get( '/create', [
                'uses' => 'GradeController@create'
            ] )->name( 'grades.create' );

            Route::post( '/create', [
                'uses' => 'GradeController@store'
            ] )->name( 'grades.store' );

            Route::get( '/edit/{grade}', [
                'uses' => 'GradeController@edit'
            ] )->name( 'grades.edit' );

            Route::post( '/update', [
                'uses' => 'GradeController@update'
            ] )->name( 'grades.update' );

            Route::delete( '/', [
                'uses' => 'GradeController@delete'
            ] )->name( 'grades.delete' );

        } );

        Route::group( ['prefix' => 'notifications'], function(){
            Route::get('/', [
                'uses' => 'DashboardController@index2'
            ])->name('notifications');
        });

        Route::group( ['prefix' => 'wysylka'], function(){
            Route::get('/', [
                'uses' => 'SendEmail@index'
            ])->name('wysylka.index');

            Route::post('/sendemaile',[
                'uses' => 'SendEmail@store'
            ])->name('wysylka.sendemaile');
        });

    });

});
