<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class RegistrationController extends BaseController
{
    public function index()
    {
        return view('auth/register');
    }
    public function doRegister(){
        
    }
}
