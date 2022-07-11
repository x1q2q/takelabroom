<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public $userid;
    public $userModel;
    public function __construct()
    {
        $this->userid = session()->get('id_user'); 
        $this->userModel = new UserModel();
        helper('html');
    }
    public function index()
    {
        $total = [
            'reservasi' => 5,
            'fasilitas' => 55,
            'labroom'   => 36
        ];
        $data['total'] = $total;
        $data['userProfile'] = $this->userModel->where('id_user',$this->userid)->first();
        return view('member/dashboard',$data);
    }
}
