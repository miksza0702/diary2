@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>System powiadomień</h1>
@stop

@section('content_top_nav_right')
    @include('dashboard.header')
@stop

@section('content')
    <h3 class="text-center mt-4">Wysylka email</h3>
    <div class="diary-container">
        <div class="diary-container-body">
            <form action=" {{ route( 'wysylka.sendemaile' )  }}" id="form-send-email" method="POST" novalidate enctype="multipart/form-data">
                @csrf
                <div class="diary-form-row">
                    <label for="student">{{__('dashboard/wysylka.Użytkownik')}}</label>
                    <select name="user_id" id="user_id" class="form-control input-md input-select2" required>
                        <option value="0" selected>{{__('dashboard/wysylka.Użytkownik')}}</option>
                        @foreach($users as $user)
                            <option value="{{$user->email}}" @if( old( 'id') == $user->id ) selected @endif>
                                {{$user->meta->name}} {{$user->meta->surname}} | Adres e-mail: "{{$user->email}}"
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="diary-form-row">
                    <label for="text">Tytuł</label>
                    <textarea id="tytul" name="tytul" placeholder="tytul" class="form-control input-md">Wpisz tytuł e-mail</textarea>
                </div>
                <div class="diary-form-row">
                    <label for="text">Treść</label>
                    <textarea id="text" name="text" placeholder="tresc" class="form-control input-md">Wpisz treść e-mail</textarea>
                </div>
                <div class="form-btn-group form-rows" style="justify-content: flex-end;">
                    <button class="action-button btn btn-success confirm"><i class="fas fa-check"></i> Wyślij</button>
                </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
