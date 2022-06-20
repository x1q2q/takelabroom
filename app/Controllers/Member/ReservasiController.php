<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\CategoryModel;
use App\Models\LabroomModel;
use App\Models\CodeFacilityModel;
use App\Models\FacilityModel;
use Config\Services;

class ReservasiController extends BaseController
{
    public $datatable;
    public $categoryModel;
    public $labroomModel;
    public $codeFacModel;
    public $facilityModel;
    public $req;
    public function __construct()
    {
        $this->datatable = new ReservationModel();
        $this->categoryModel = new CategoryModel();
        $this->labroomModel = new LabroomModel();
        $this->codeFacModel = new CodeFacilityModel();
        $this->facilityModel = new FacilityModel();
        $this->req = Services::request();
        helper('html');   
    }
    public function addReservation(){
        $data['category'] = $this->categoryModel->get()->getResult();
        return view('member/add_reservasi',$data);
    }
    public function checkLab($slug){
        $category = $this->categoryModel->where('slug',$slug)->first();
        $data['category'] = $category;
        $query = $this->labroomModel->where('category_id',$category["id_category"])->get()->getResult();
        $labroom = [];
        foreach ($query as $list) {
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
            $row->label_status = ($list->status_lab == 'available') ? 'success' : 'warning';
            $labroom[] = $row;
        }
        $data['labroom'] = $labroom;
        return view('member/check_lab',$data);;
    }
    public function myReservation(){
        return view('member/my_reservasi');
    }

}
