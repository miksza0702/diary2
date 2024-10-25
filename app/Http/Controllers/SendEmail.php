<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    protected const attributesNames = [
        'user_id'               => '<strong>Użytkownik</strong>',
        'tytul'                 => '<strong>Tytuł</strong>',
        'text'                  => '<strong>Treść</strong>',
    ];
    public function index(){
        $users = User::all();
        return view(('dashboard.wysylka.index'), [
            'users' => $users,
        ]);

    }
    public function store( Request $request ){


        $validator= Validator::make($request->all(), [
            'user_id' => 'required|not_in:0',
            'tytul' => 'required|nullable',
            'text' => 'required|nullable',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput(
                $request->all( 'user_id', 'tytul', 'text' )
            );
        }

        Mail::send('dashboard.wysylka.tresc', array(
            'user_id' => $request->get('user_id'),
            'tytul' => $request->get('tytul'),
            'text' => $request->get('text'),
        ), function ($message) use ($request){
                $message->from('dziennikmiksza@gmail.com');
                $message->to($request->get('user_id'))->subject($request->get('tytul'));
        });

        return redirect()->route('wysylka.index')->with('alert',[
            'title' => 'Pomyślnie wyslano powiadomienie!',
            'type'  => 'success',
            'timer' => '5000',
        ]);
    }
}
