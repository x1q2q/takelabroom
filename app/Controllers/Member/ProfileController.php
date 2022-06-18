<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('member/profile');
    }
}
