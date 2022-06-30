<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LaporanModel;
use App\Models\AdminModel;
use Config\Services;

class LaporanController extends BaseController
{
    public $datatable;
    public $req;
    public $attribute;
    public $adminid;
    public $adminModel;
    public function __construct()
    {
        $this->datatable = new LaporanModel();
        $this->req = Services::request();
        $this->adminid = session()->get('id_admin'); 
        $this->adminModel = new AdminModel();
        helper('html');
    }
    public function index()
    {
        $data['adminProfile'] = $this->adminModel->where('id_admin',$this->adminid)->first();
        return view('admin/reservation_report', $data);
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
