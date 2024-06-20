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

    public function userList()
    {
        return view('telat/users/index');
    }

    public function addUsers()
    {
        return view('telat/users/form');
    }

    public function address()
    {
        return view('telat/address/index');
    }

    public function userType()
    {
        return view('telat/user-type/index');
    }
}
