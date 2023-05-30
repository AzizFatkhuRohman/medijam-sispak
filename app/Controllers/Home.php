<?php

namespace App\Controllers;

class Home extends BaseController
{
    //Halaman Depan
    public function index()
    {
        return view('index');
    }
    public function dashboard(){
        $title = 'Dashboard';
        return view('dashboard/dashboard', compact('title'));
    }
}
