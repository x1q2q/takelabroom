<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use Config\Services;

class ReservasiController extends BaseController
{
    public $datatable;
    public $req;
    public function __construct()
    {
        $this->datatable = new ReservationModel();
        $this->req = Services::request();
        helper('html');   
    }
    public function addReservasi(){
        return view('member/add_reservasi');
    }
    public function historyReservasi(){
        return view('member/history_reservasi');
    }

}
