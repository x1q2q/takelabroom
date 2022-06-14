<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class UserController extends BaseController
{
    public $datatable;
    public $req;
    public $attribute;
    public function __construct()
    {
        $this->datatable = new UserModel();
        $this->req = Services::request();
        helper('html');
    }
    public function index()
    {
        return view('admin/user');
    }
    public function getData(){
        $this->datatable->initDatatables($this->request);

        if ($this->request->isAJAX()) {
            $data = $this->datatable->getDatatables();
            $output = [
                'draw' => $this->request->getPost('draw'),
                'recordsTotal' => $this->datatable->countAll(),
                'recordsFiltered' => $this->datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }
    public function detailData($id){
        if ($this->req->isAJAX()) {
            $data = $this->datatable->where('id_user',$id)->first();
            return json_encode($data);
        }
    }
    public function deleteData($id){
        if ($this->req->isAJAX()) {
            $user = $this->datatable;
            if($user->delete($id)){
                $result = ['status' => 200, 'message' => 'Data user berhasil dihapus'];
            }else{
                $result = ['status' => 500, 'message' => 'Data user gagal dihapus'];
            }
            return json_encode($result);
        }
    }
}
