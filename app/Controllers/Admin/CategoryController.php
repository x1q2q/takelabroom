<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public $datatable;
    public $req;
    public $attribute;
    public function __construct()
    {
        $this->datatable = new CategoryModel();
        $this->req = Services::request();
        helper('html');
    }
    public function index()
    {
        return view('admin/category');
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
    public function setAttribute($additionalAttribut = false){
        $this->attribute = [];
        $this->attribute = [
            'name_category' => [
                'label' => 'Nama Kategori','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'desc_category' => [
                'label' => 'Deskripsi','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
        ];
        if($additionalAttribut){
            $this->attribute['thumb_category'] = [
                'label' => 'Thumbnail',
                'rules' => 'uploaded[thumb_category]|ext_in[thumb_category,jpg,jpeg,png]|max_size[thumb_category,2000000]',
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
            $data = $this->datatable->where('id_category',$id)->first();
            return json_encode($data);
        }
    }
    public function insertData(){
        $validation = \Config\Services::validation();
        $this->setAttribute(true);// set additional to true so image is a must
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $kategori = $this->datatable;
            $newName = '';
            if($file = $this->request->getFile('thumb_category')) {
                if ($file->isValid() && ! $file->hasMoved()) {    
                   $newName = 'img_cat_'.$file->getRandomName(); // for file name   
                   // Store file in public ... /uploads/categories folder
                   $file->move('../public/assets/img/uploads/categories', $newName);
                }
            }
            $values = [
                "name_category" => $this->request->getPost('name_category'),
                "desc_category" => $this->request->getPost('desc_category'),
                "slug" => url_title($this->request->getPost('name_category'), '-', true),
                "thumb_category" => $newName,
            ];
            $kategori->insert($values);
            $result = ['status' => 200, 'data' => $values,'message' => 'Data kategori berhasil ditambahkan'];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Data kategori gagal ditambahkan'];
        }
        return json_encode($result);
    }
    public function updateData($id){
        $validation = \Config\Services::validation();
        $old = $this->datatable->where('id_category',$id)->first();
        $newName = '';
        if($old['thumb_category'] != $this->request->getPost('category_file_name')){
            $this->setAttribute(true);
        }else{
            $newName = $old['thumb_category'];
            $this->setAttribute(false); // if nothing change in file input than not set attrib
        }
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $kategori = $this->datatable;
            if($file = $this->request->getFile('thumb_category')) {
                if ($file->isValid() && ! $file->hasMoved()) {    
                   $newName = 'img_cat_'.$file->getRandomName(); // for file name   
                   // Store file in public/uploads/categories folder
                   $file->move('../public/assets/img/uploads/categories', $newName);
                }
            }
            $values = [
                "name_category" => $this->request->getPost('name_category'),
                "desc_category" => $this->request->getPost('desc_category'),
                "slug" => url_title($this->request->getPost('name_category'), '-', true),
                "thumb_category" => $newName,
            ];
            $kategori->update($id,$values);
            $result = ['status' => 200, 'data' => $values,'message' => 'Data kategori berhasil diupdate'];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Data kategori gagal diupdate'];
        }
        return json_encode($result);
    }
    public function deleteData($id){
        if ($this->req->isAJAX()) {
            $kategori = $this->datatable;
            if($kategori->delete($id)){
                $result = ['status' => 200, 'message' => 'Data kategori berhasil dihapus'];
            }else{
                $result = ['status' => 500, 'message' => 'Data kategori gagal dihapus'];
            }
            return json_encode($result);
        }
    }
}
