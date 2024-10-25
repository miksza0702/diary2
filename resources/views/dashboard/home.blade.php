@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel główny</h1>
@stop

@section('content_top_nav_right')
    @include('dashboard.header')
@stop

@section('content')
    <h3 class="text-center mt-4">eRegister - dziennik elektroniczny</h3>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Notyfikacje</div>
            <div class="card-body">

                @foreach(Auth::user()->unreadNotifications as $notification)
                    <h5> {{ $notification->data['student_id']}} dostal uwage o treści: {{$notification->data['note_text']}}</h5>
                    <p>{{ $notification->created_at->diffForHumans() }}</p>
                @endforeach

                <a href="dashboard\MarkAsRead">Mark as read</a>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        <li class="user">
                            <span class="pending">1</span>
                            <div class="media">
                                <div class="media-left">
                                    <img src="https://via.placeholder.com/150" alt="" class="media-object">
                                </div>
                                <div class="media-body">
                                    <p class="name">John Doe</p>
                                    <p class="email">john@gmail.com</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages">
                <div class="message-wrapper">
                    <ul class="messages">
                        <li class="message clearfix">
                            <div class="sent">
                                <p>Lorem ipsum dolor</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="message clearfix">
                            <div class="received">
                                <p>Lorem ipsum dolor.</p>
                                <p class="date">1 sep, 2020</p>
                            </div>
                        </li>
                        <li class="message clearfix">
                            <div class="sent">
                                <p>Lorem ipsum dolor</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="message clearfix">
                            <div class="received">
                                <p>Lorem ipsum dolor.</p>
                                <p class="date">1 sep, 2020</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="input-text">
                    <input type="text" name="message" class="submit">
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
