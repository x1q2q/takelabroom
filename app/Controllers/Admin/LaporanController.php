<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\LaporanModel;

class LaporanController extends BaseController
{
    public $datatable;
    public $req;
    public $attribute;
    public function __construct()
    {
        $this->datatable = new LaporanModel();
        $this->req = Services::request();
        helper('html');
    }
    public function index()
    {
        return view('admin/reservation_report');
    }
    public function getData(){
        if ($this->req->isAJAX()) {
            $this->datatable->initDatatables($this->req);
            $data = $this->datatable->getDatatables();
            $output = [
                'draw' => $this->req->getPost('draw'),
                'recordsTotal' => $this->datatable->countAll(),
                'recordsFiltered' => $this->datatable->countFiltered(),
                'data' => $data
            ];
            return json_encode($output);
        }
    }
    public function detailData($id){
        if ($this->req->isAJAX()) {
            $data = $this->datatable->where('id_category',$id)->first();
            return json_encode($data);
        }
    }
}
