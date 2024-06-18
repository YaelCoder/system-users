<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('telat/login');
    }

    public function dashboard()
    {
        return view('telat/dashboard/index');
    }
}
