<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function __construct()
    {
        helper('html');
    }
    public function index()
    {
        return view('admin/dashboard');
    }
}
