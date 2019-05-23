<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
    //
    public function getApp()
    {
        // return 1;
        return view('app');
    }
    public function getLogin()
    {
        return view('login');
    }
}
