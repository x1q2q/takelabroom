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
    public $attribute;
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
    public function getData($field,$id){
        if ($this->req->isAJAX()) {
            $joinOnOrder = ($field == 'user_id') ? true:false; // to add left join with table orders
            $this->datatable->initDatatables($this->req, $joinOnOrder);
            $data = $this->datatable->getWhereDetail($field,$id);
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
                'recordsTotal' => count($newData),
                'recordsFiltered' => count($newData),
                'data' => $newData
            ];

            return json_encode($output);
        }
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
    public function setAttribute(){
        $this->attribute = [];
        $this->attribute = [
            'name_lab' => [
                'label' => 'Nama Lab','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong, silakan pilih labroom']],
            'tgl_pakai' => [
                'label' => 'Tanggal Pakai','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'time_start' => [
                'label' => 'Waktu Mulai','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'time_end' => [
                'label' => 'Waktu Selesai','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
        ];
    }
    public function insertData(){
        $validation = \Config\Services::validation();
        $this->setAttribute(true);// set additional to true so image is a must
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $reservation = $this->datatable;
            $userId = 1;
            $codeReserv = 'RESV'.$userId.'.'.strtoupper(uniqid());
            $tglPakai = $this->request->getPost('tgl_pakai');
            $waktuMulai = $this->request->getPost('time_start');
            $waktuAkhir = $this->request->getPost('time_end');
            $timeStart = $tglPakai.' '.$waktuMulai.':00';
            $timeEnd = $tglPakai.' '.$waktuAkhir.':00';
            $values = [
                "lab_id"        => $this->request->getPost('id_lab'),
                "user_id"       => $userId,
                "code_reserv"   => $codeReserv,
                "time_start"    => date('Y-m-d H:i:s', strtotime($timeStart)),
                "time_end"      => date('Y-m-d H:i:s', strtotime($timeEnd)),
                "status_reserv" => "pending",
            ];
            // validation check for ketersediaan lab goes here

            $isNotAvailable = false; // $query->hasInTime()
            $isNotInRightTime = false; // not in 07:00 - 21:00
            $isNotInRightMinMax = false; // if > 1 week and < 24hour from inserted at
            $isNotRightPositionTime = false; // if time_start > time_end / time_end < time_start 
            if($isNotAvailable){ // jika tidak available (karena jam itu penuh)
                $result = ['status' => 500, 'data' => [], 
                'message' => 'Ruang Lab untuk jam '.$waktuMulai.'-'.$waktuAkhir
                .' sudah ada yang memesan. Silakan pilih waktu di luar jam tersebut'];
            }else if($isNotInRightTime){ // jka tidak pada waktu yang benar
                $result = ['status' => 500, 'data' => [], 
                'message' => 'Anda hanya bisa mengajukan reservasi lab antara jam 07.00 - 21.00'];
            }else if($isNotInRightMinMax){ // jika tidak benar pada value benar min max peminjaman 
                $result = ['status' => 500, 'data' => [], 
                'message' => 'Reservasi tidak boleh lebih 2 minggu
                    dan tidak kurang 24 jam dari waktu sekarang'];
            }else if($isNotRightPositionTime){ // jika tidak benar pada value benar min max peminjaman 
                $result = ['status' => 500, 'data' => [], 
                'message' => 'Posisi antara waktu mulai & waktu selesai masih salah. Silakan tukar atau pilih waktu lain'];
            }else{ // if true
                $reservation->insert($values);
                // set session flash data success goes here
                $result = ['status' => 200, 'data' => $values,'message' => site_url('member/my-reservation')];
            }
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Gagal mengajukan reservasi'];
        }
        return json_encode($result);
    }
    public function myReservation(){
        $data['userid'] = 1;
        return view('member/my_reservation',$data);
    }

}
