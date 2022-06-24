<?php

namespace App\Controllers;

class GuestController extends BaseController
{
    public function index()
    {
        return view('guest/home');
    }
    public function labroom()
    {
        return view('guest/labroom');
    }
    public function contact()
    {
        return view('guest/contact');
    }
}
