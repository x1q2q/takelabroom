<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LabroomModel;
use App\Models\CodeFacilityModel;
use App\Models\FacilityModel;
use App\Models\CategoryModel;
use App\Models\AdminModel;
use Config\Services;

class LabroomController extends BaseController
{
    public $req;
    public $attribute;
    public $datatable;
    public $codeFacModel;
    public $facilityModel;
    public $adminid;
    public $adminModel;
    public function __construct()
    {
        $this->datatable = new LabroomModel();
        $this->codeFacModel = new CodeFacilityModel();
        $this->facilityModel = new FacilityModel();
        $this->adminid = session()->get('id_admin'); 
        $this->adminModel = new AdminModel();
        $this->req = Services::request();
        helper('html');
    }
    public function index()
    {
        $data['adminProfile'] = $this->adminModel->where('id_admin',$this->adminid)->first();;
        return view('admin/labroom', $data);
    }
    public function getData(){        
        $this->datatable->initDatatables($this->req);
        if ($this->req->isAJAX()) {
            $data = $this->datatable->getDatatables();
            $newData = [];
            foreach ($data as $list) {
                $queryCodeFac = $this->codeFacModel->where('code_facility', $list->code_facility)
                                ->get()->getResultArray();
                $dataIdFacility = array_map (function($value){
                    return (int)$value['facility_id'];
                    }, $queryCodeFac); // return id facilitiy []
                    
                $facility = $this->facilityModel->getListFacility($dataIdFacility);
                $dtFacility = array_map (function($value){
                    return $value->name_facility;
                    }, $facility); // return list name facility
                $row = [];
                $row = $list;
                $row->list_facility = join(', ',$dtFacility);
                $newData[] = $row;
            }
            $output = [
                'draw' => $this->req->getPost('draw'),
                'recordsTotal' => $this->datatable->countAll(),
                'recordsFiltered' => $this->datatable->countFiltered(),
                'data' => $newData
            ];

            echo json_encode($output);
        }
    }
    public function setAttribute(){
        $this->attribute = [];
        $this->attribute = [
            'category_data' => [
                'label' => 'Kategori Lab','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'name_lab' => [
                'label' => 'Nama Lab','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'capacity' => [
                'label' => 'Kapasitas','rules' => 'required|is_natural',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'is_natural' => '{field} harus berupa angka']],
            'facility_data' => [
                'label' => 'Daftar Fasilitas','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
        ];
    }
    public function getListData($table){
        if ($this->req->isAJAX()) {
            $model = ($table == 'categories') ? 
                    new CategoryModel(): new FacilityModel();
            $data = $model->get()->getResultArray();
            return json_encode($data);
        }
    }
    public function detailData($id){
        if ($this->req->isAJAX()) {
            $this->datatable->initDatatables($this->req);
            $data = $this->datatable->getWhereDetail($id);
            $queryCodeFac = $this->codeFacModel->where('code_facility', $data[0]->code_facility)
                            ->get()->getResultArray();
            $dataIdFacility = array_map (function($value){
                return (int)$value['facility_id'];
                }, $queryCodeFac); // return id facilitiy []
                
            $facility = $this->facilityModel->getListFacility($dataIdFacility);
            $data[0]->list_facility = $facility;
            $data[0]->total_facility = count($dataIdFacility);
            $newData = $data[0];
            return json_encode($newData);
        }
    }
    public function insertData(){
        $validation = \Config\Services::validation();
        $this->setAttribute();// set additional to true so image is a must
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $labroom = $this->datatable;
            $codeFacModel = $this->codeFacModel;
            $dataFacility = $this->request->getPost('facility_data');
            $categoryId = $this->request->getPost('category_data');
            $codeFacility = 'LABR'.$categoryId.'-'.strtoupper(uniqid());
            foreach($dataFacility as $value){
                $val = [
                    'code_facility' => $codeFacility,
                    'facility_id' => (int)$value
                ];
                $codeFacModel->insert($val);
            }
            $values = [
                "category_id" => $categoryId,
                "name_lab" => $this->request->getPost('name_lab'),
                "capacity" => $this->request->getPost('capacity'),
                "desc_lab" => $this->request->getPost('desc_lab'),
                "code_facility" => $codeFacility,
            ];
            $labroom->insert($values);
            $result = ['status' => 200, 'data' => $values,'message' => 'Data lab berhasil ditambahkan'];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Data lab gagal ditambahkan'];
        }
        return json_encode($result);
    }
    public function updateData($id){
        $validation = \Config\Services::validation();
        $old = $this->datatable->where('id_lab',$id)->first();
        $this->setAttribute();// set additional to true so image is a must
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $labroom = $this->datatable;
            $codeFacModel = $this->codeFacModel;
            // remove old data
            if($codeFacModel->delete($old['code_facility'])){
                // start to insert
                $dataFacility = $this->request->getPost('facility_data');
                $categoryId = $this->request->getPost('category_data');
                $codeFacility = 'LABR'.$categoryId.'-'.strtoupper(uniqid());
                foreach($dataFacility as $value){
                    $val = [
                        'code_facility' => $codeFacility,
                        'facility_id' => (int)$value
                    ];
                    $codeFacModel->insert($val);
                }
                $values = [
                    "category_id" => $categoryId,
                    "name_lab" => $this->request->getPost('name_lab'),
                    "capacity" => $this->request->getPost('capacity'),
                    "desc_lab" => $this->request->getPost('desc_lab'),
                    "code_facility" => $codeFacility,
                ];
                $labroom->update($id,$values);
                $result = ['status' => 200, 'data' => $values,'message' => 'Data lab berhasil diupdate'];
            }else{
                $errCodeFac = array('facility_data' => 'Data tidak bisa dihapus');
                $result = ['status' => 500, 'data' => $errCodeFac,'message' => 'Data lab gagal diupdate'];
            }
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Data lab gagal diupdate'];
        }
        return json_encode($result);
    }
    public function deleteData($id){
        if ($this->req->isAJAX()) {
            $labroom = $this->datatable;
            if($labroom->delete($id)){
                $result = ['status' => 200, 'message' => 'Data lab berhasil dihapus'];
            }else{
                $result = ['status' => 500, 'message' => 'Data lab gagal dihapus'];
            }
            return json_encode($result);
        }
    }
}
