<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FacilityModel;
use Config\Services;

class FacilityController extends BaseController
{
    public $datatable;
    public $req;
    public $attribute;
    public function __construct()
    {
        $this->datatable = new FacilityModel();
        $this->req = Services::request();
    }
    public function index()
    {
        helper('html');
        return view('admin/facility');
    }
    public function getData(){
        if($this->req->isAJAX()){
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
    public function setAttribute($additionalAttribut = false){
        $this->attribute = [];
        $this->attribute = [
            'name_facility' => [
                'label' => 'Nama Fasilitas','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'qty_facility' => [
                'label' => 'Jumlah','rules' => 'required|is_natural',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'is_natural' => '{field} harus berupa angka']],
            'price' => [
                'label' => 'Harga Sewa','rules' => 'required|is_natural',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'is_natural' => '{field} harus berupa angka']],
        ];
        if($additionalAttribut){
            $this->attribute['thumb_facility'] = [
                'label' => 'Thumbnail',
                'rules' => 'uploaded[thumb_facility]|ext_in[thumb_facility,jpg,jpeg,png]|max_size[thumb_facility,2000000]',
                'errors' => [
                    'uploaded' => '{field} harap diisi jpg/jpeg/png',
                    'ext_in' => '{field} harus berupa jpg/jpeg/png',
                    'max_size' => '{field} tidak boleh melebihi batas 2Mb'
                ]
            ];
        }
    }
    public function detailData($id){
        if ($this->req->isAJAX()) {
            $data = $this->datatable->where('id_facility',$id)->first();
            return json_encode($data);
        }
    }
    public function insertData(){
        $validation = \Config\Services::validation();
        $this->setAttribute(true);// set additional to true so image is a must
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $fasilitas = $this->datatable;
            $newName = '';
            if($file = $this->request->getFile('thumb_facility')) {
                if ($file->isValid() && ! $file->hasMoved()) {    
                   $newName = 'img_fac_'.$file->getRandomName(); // for file name   
                   // Store file in public ... /uploads/facilities folder
                   $file->move('../public/assets/img/uploads/facilities', $newName);
                }
            }
            $values = [
                "name_facility" => $this->request->getPost('name_facility'),
                "qty_facility" => $this->request->getPost('qty_facility'),
                "price" => $this->request->getPost('price'),
                "thumb_facility" => $newName,
            ];
            $fasilitas->insert($values);
            $result = ['status' => 200, 'data' => $values,'message' => 'Data fasilitas berhasil ditambahkan'];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Data fasilitas gagal ditambahkan'];
        }
        return json_encode($result);
    }
    public function updateData($id){
        $validation = \Config\Services::validation();
        $old = $this->datatable->where('id_facility',$id)->first();
        $newName = '';
        if($old['thumb_facility'] != $this->request->getPost('facility_file_name')){
            $this->setAttribute(true);
        }else{
            $newName = $old['thumb_facility'];
            $this->setAttribute(false); // if nothing change in file input than not set attrib
        }
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $fasilitas = $this->datatable;
            if($file = $this->request->getFile('thumb_facility')) {
                if ($file->isValid() && ! $file->hasMoved()) {    
                   $newName = 'img_fac_'.$file->getRandomName(); // for file name   
                   // Store file in public/uploads/facilities folder
                   $file->move('../public/assets/img/uploads/facilities', $newName);
                }
            }
            $values = [
                "name_facility" => $this->request->getPost('name_facility'),
                "qty_facility" => $this->request->getPost('qty_facility'),
                "price" => $this->request->getPost('price'),
                "thumb_facility" => $newName,
            ];
            $fasilitas->update($id,$values);
            $result = ['status' => 200, 'data' => $values,'message' => 'Data fasilitas berhasil diupdate'];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Data fasilitas gagal diupdate'];
        }
        return json_encode($result);
    }
    public function deleteData($id){
        if ($this->req->isAJAX()) {
            $fasilitas = $this->datatable;
            if($fasilitas->delete($id)){
                $result = ['status' => 200, 'message' => 'Data fasilitas berhasil dihapus'];
            }else{
                $result = ['status' => 500, 'message' => 'Data fasilitas gagal dihapus'];
            }
            return json_encode($result);
        }
    }
}
