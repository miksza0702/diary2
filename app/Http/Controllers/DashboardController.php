<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view( 'dashboard.home', [

        ] );
    }
    public function index2(){
        return view( 'dashboard.notifications.index', [

        ] );
    }
}
