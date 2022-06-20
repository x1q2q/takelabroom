<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('member/my_profile');
    }
    public function settingProfile()
    {
        return view('member/setting_profile');
    }
}
