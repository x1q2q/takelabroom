<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use Config\Services;
use App\Models\AdminModel;

class OrderController extends BaseController
{
    public $datatable;
    public $req;
    public $db;
    public $adminid;
    public $adminModel;
    public function __construct()
    {
        $this->datatable = new OrderMOdel();
        $this->req = Services::request();
        $this->db = \Config\Database::connect();
        $this->adminid = session()->get('id_admin'); 
        $this->adminModel = new AdminModel();
        helper('html');
    }
    public function index()
    {
        $data['adminProfile'] = $this->adminModel->where('id_admin',$this->adminid)->first();
        return view('admin/reservation_paid', $data);
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
                $result = ['status' => 200, 'message' => 'Data order berhasil dihapus'];
            }else{
                $result = ['status' => 500, 'message' => 'Data order gagal dihapus'];
            }
            return json_encode($result);
        }
    }
    public function changeStatus(){
        if ($this->req->isAJAX()) {
            $codeReserv = $this->request->getPost('code_reserv');
            $toStatus = $this->request->getPost('status');
            $dbOrder = $this->db->table('orders');  
            $where = ['code_reserv' => $codeReserv];
            $values = [
                'status_order' => $toStatus
            ];

            if($dbOrder->update($values,$where)){
                $dbReserv = $this->db->table('reservations');
                $valStatusReserv = ($toStatus == 'cancelled') ? 'cancelled': 'verified';
                $setReserv = ['status_reserv' => $valStatusReserv];
                $dbReserv->update($setReserv,$where);
                $result = ['status' => 200, 'data' => [],'message' => 'Reservasi berbayar berhasil diganti status menjadi '.$toStatus];
            }else{
                $result = ['status' => 500, 'data' => [],'message' => 'Reservasi gagal diganti status'];
            }
            return json_encode($result);
        }
    }
    public function uploadBukti(){
        $validation = \Config\Services::validation();
        $attribute = [
            'thumb_bukti' => [
                'label' => 'Bukti Gambar',
                'rules' => 'uploaded[thumb_bukti]|ext_in[thumb_bukti,jpg,jpeg,png]|max_size[thumb_bukti,2000000]',
                'errors' => [
                    'uploaded' => '{field} harap diisi jpg/jpeg/png',
                    'ext_in' => '{field} harus berupa jpg/jpeg/png',
                    'max_size' => '{field} tidak boleh melebihi batas 2Mb'
                ]
            ]
        ];
        $codeReserv = $this->req->getPost('code_reserv');
        $order = $this->datatable;
        $orderData = $order->where('code_reserv',$codeReserv)->first();
        $id = $orderData['id_order'];
        $validation->setRules($attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            if($file = $this->request->getFile('thumb_bukti')) {
                if ($file->isValid() && ! $file->hasMoved()) {    
                   $newName = 'img_order_'.$file->getRandomName(); // for file name   
                   // Store file in public ... /uploads/orders folder
                   $file->move('../public/assets/img/uploads/orders', $newName);
                }
            }
            $values = [
                "status_order" => "paided",
                "thumb_order" => $newName
            ];
            $order->update($id, $values);
            $result = ['status' => 200, 'data' => $values,
                'message' => 'Berhasil mengupload bukti pembayaran untuk reservasi '.$codeReserv];
        }else{
            $result = ['status' => 500, 'data' => [],
                'message' => 'Gagal mengupload bukti pembayaran untuk reservasi '.$codeReserv];
        }
        return json_encode($result);
    }
}
