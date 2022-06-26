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
    public function lab1()
    {
        return view('guest/lab1');
    }
    public function lab2()
    {
        return view('guest/lab2');
    }
    public function lab3()
    {
        return view('guest/lab3');
    }
}
