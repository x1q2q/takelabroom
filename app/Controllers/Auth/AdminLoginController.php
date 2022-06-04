<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class AdminLoginController extends BaseController
{
    public function index()
    {
        return view('auth/admin_login');
    }
    public function doLogin(){
        
    }
}
