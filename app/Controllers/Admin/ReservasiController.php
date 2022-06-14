<?php

namespace App\Controllers\Admin;

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
    public function index()
    {
        return view('admin/reservation');
    }
    public function getData(){        
        if ($this->req->isAJAX()) {
            $this->datatable->initDatatables($this->req);
            $data = $this->datatable->getDatatables();
            $newData = [];
            foreach ($data as $list) {
                $splitDateStart = explode(' ',$list->time_start);
                $splitDateEnd = explode(' ',$list->time_end);
                
                $row = [];
                $row = $list;
                $row->time_start = substr($splitDateStart[1],0,5);
                $row->time_end = substr($splitDateEnd[1],0,5);
                $row->date_booking = $splitDateStart[0];
                $newData[] = $row;
            }
            $output = [
                'draw' => $this->req->getPost('draw'),
                'recordsTotal' => $this->datatable->countAll(),
                'recordsFiltered' => $this->datatable->countFiltered(),
                'data' => $newData
            ];

            return json_encode($output);
        }
    }
    public function detailData($id){
        if ($this->req->isAJAX()) {
            $this->datatable->initDatatables($this->req);
            $data = $this->datatable->getWhereDetail($id);
            $splitDateStart = explode(' ',$data[0]->time_start);
            $splitDateEnd = explode(' ',$data[0]->time_end);
            $data[0]->time_start  = substr($splitDateStart[1],0,5);
            $data[0]->time_end  = substr($splitDateEnd[1],0,5);
            $data[0]->date_booking = $splitDateStart[0];
            return json_encode($data[0]);
        }
    }
    public function deleteData($id){
        if ($this->req->isAJAX()) {
            $user = $this->datatable;
            if($user->delete($id)){
                $result = ['status' => 200, 'message' => 'Data reservasi berhasil dihapus'];
            }else{
                $result = ['status' => 500, 'message' => 'Data reservasi gagal dihapus'];
            }
            return json_encode($result);
        }
    }
}
