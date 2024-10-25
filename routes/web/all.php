<?php

use Illuminate\Support\Facades\Route;
use App\User;

use App\Http\Controllers\SendEmail;

Route::middleware( ['auth', 'roles'] )->group( static function(){
    Route::get( '/', 'DashboardController@index' )->name( 'home' );

    Route::get( '/dashboard', 'DashboardController@index' )->name( 'home' );

    Route::group( [ 'prefix' => 'dashboard' ], function(){
        Route::get( '/profile', [
            'uses' => 'UserController@profileIndex',
        ] )->name( 'users.profile' );

        Route::post( '/profileUpdate', [
            'uses' => 'UserController@profileUpdate'
        ] )->name( 'users.profileUpdate' );

        Route::post( '/passwordUpdate', [
            'uses' => 'UserController@passwordUpdate'
        ] )->name( 'users.passwordUpdate' );

        Route::get('/x', function (){
            //$user = Auth::user();
            //$user->notify(new \App\Notifications\NewNote(User::findOrFail(2)));die;

            //zazneczenie jako przeczytane
            //foreach (Auth::user()->notifications as $notification){
            //    $notification->markAsRead();
            //}


            //pokazanie nieprzeczytanych
//            foreach (Auth::user()->unreadNotifications as $notification){
//                dd($notification);
//            }
            foreach (Auth::user()->readNotifications as $notification){
                echo $notification;
            }
        });
        Route::get('/MarkAsRead', function(){
            foreach (Auth::user()->notifications as $notification){
                $notification->markAsRead();
            }
            return view('dashboard.notifications.index');
        });
        Route::get('/sendemail', [SendEmail::class, 'sendEmail']);


    });
});
