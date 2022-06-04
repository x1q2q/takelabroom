<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class MemberLoginController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
    public function doLogin(){
        
    }
}
