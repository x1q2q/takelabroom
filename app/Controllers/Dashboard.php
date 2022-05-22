<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }
    public function card()
    {
        return view('pages-html/card');
    }
    public function form()
    {
        return view('pages-html/form_layouts');
    }
    public function input()
    {
        return view('pages-html/input_groups');
    }
    public function modals()
    {
        return view('pages-html/modals');
    }
    public function table()
    {
        return view('pages-html/table');
    }
}
