<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\CategoryModel;
use App\Models\LabroomModel;
use App\Models\CodeFacilityModel;
use App\Models\FacilityModel;
use App\Models\UserModel;
use App\Models\OrderModel;
use Config\Services;

class ReservasiController extends BaseController
{
    public $datatable;
    public $categoryModel;
    public $labroomModel;
    public $codeFacModel;
    public $facilityModel;
    public $userModel;
    public $orderModel;
    public $req;
    public $attribute;
    public $userid;
    public function __construct()
    {
        $this->datatable = new ReservationModel();
        $this->categoryModel = new CategoryModel();
        $this->labroomModel = new LabroomModel();
        $this->codeFacModel = new CodeFacilityModel();
        $this->facilityModel = new FacilityModel();
        $this->userModel = new UserModel();
        $this->orderModel = new OrderModel();
        $this->req = Services::request();
        $this->userid = session()->get('id_user');
        helper('html');
    }
    public function getData($field, $id)
    {
        if ($this->req->isAJAX()) {
            $joinOnOrder = ($field == 'user_id') ? true : false; // to add left join with table orders
            $this->datatable->initDatatables($this->req, $joinOnOrder);
            $data = $this->datatable->getWhereDetail($field, $id);
            $labid = [];
            if ($field == 'category_id') {
                $labid = $this->req->getPost('lab_id');
            }
            $newData = [];
            foreach ($data as $list) {
                $splitDateStart = explode(' ', $list->time_start);
                $splitDateEnd = explode(' ', $list->time_end);

                $row = [];
                $row = $list;
                $isNeedPayment = (!empty($list->total_payment)) ? true : false;
                $row->time_start = substr($splitDateStart[1], 0, 5);
                $row->time_end = substr($splitDateEnd[1], 0, 5);
                $row->date_booking = $splitDateStart[0];
                $row->status = ($isNeedPayment) ? (($list->status_order != 'confirmed') 
                    ? $list->status_order : $list->status_reserv): $list->status_reserv;
                $row->is_order = ($isNeedPayment) ? 1 : 0;
                $newData[] = $row;
            }
            $arrFiltering = [
                'field' => $field,
                'value' => $id,
                'lab_id' => $labid
            ];
            $output = [
                'draw' => $this->req->getPost('draw'),
                'recordsTotal' => $this->datatable->countAll($arrFiltering),
                'recordsFiltered' => $this->datatable->countFiltered($arrFiltering),
                'data' => $newData
            ];

            return json_encode($output);
        }
    }
    public function makeLabroomData($query){
        $labroom = [];
        foreach ($query as $list) {
            $queryCodeFac = $this->codeFacModel->where('code_facility', $list->code_facility)
                ->get()->getResultArray();
            $dataIdFacility = array_map(function ($value) {
                return (int)$value['facility_id'];
                }, $queryCodeFac); // return id facilitiy []
            $facility = $this->facilityModel->getListFacility($dataIdFacility);
            $dataPriceFacility = array_map (function($value){
                return (int)$value->price;
                }, $facility); // return price facility []

            $dtFacility = array_map (function($value){
                return $value->name_facility;
            }, $facility); // return list name facility
            $row = [];
            $row = $list;
            $row->list_facility = join(', ',$dtFacility);
            $row->harga_lab =  array_sum($dataPriceFacility);
            $row->harga_total = array_sum($dataPriceFacility) * 30;
            $labroom[] = $row;
        }
        return $labroom;
    }
    public function addReservation()
    {
        $data['category'] = $this->categoryModel->get()->getResult();
        $inpQuery = $this->request->getGet('q');
        $selCategory = $this->request->getGet('category');
        $data['pencarian'] = [ 'keyword'   => $inpQuery,'category'  => $selCategory];
        $userprofile = $this->userModel->where('id_user',$this->userid)->first();

        $labroom = [];
        $data['userProfile'] = $userprofile;
        if(!empty($inpQuery)){
            $this->labroomModel->initDatatables($this->req);
            $query = $this->labroomModel->searchLab($selCategory, $inpQuery);
            $labroom = $this->makeLabroomData($query);
            
            $arrLabId = array_map(function ($value) {
                return (int)$value->id_lab;
            }, $query);
            $data['data_labid'] = json_encode($arrLabId);
            $data['type_user'] = $userprofile['type_user'];
        }
        $data['labroom'] = $labroom;
        $data['category'] = $this->categoryModel->get()->getResult();
        return view('member/add_reservasi', $data);
    }
    public function checkLab($slug){
        $category = $this->categoryModel->where('slug',$slug)->first();
        $userprofile = $this->userModel->where('id_user',$this->userid)->first();
        $data['category'] = $category;
        $data['type_user'] = $userprofile['type_user'];
        $query = $this->labroomModel->where('category_id',$category["id_category"])->get()->getResult();
        $labroom = $this->makeLabroomData($query);

        $arrLabId = array_map(function ($value) {
            return (int)$value->id_lab;
        }, $query);
        $data['labroom'] = $labroom;
        $data['data_labid'] = json_encode($arrLabId);
        $data['userProfile'] = $this->userModel->where('id_user',$this->userid)->first();
        return view('member/check_lab', $data);
    }
    public function setAttribute()
    {
        $this->attribute = [];
        $this->attribute = [
            'name_lab' => [
                'label' => 'Nama Lab', 'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong, silakan pilih labroom']
            ],
            'tgl_pakai' => [
                'label' => 'Tanggal Pakai', 'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],
            'time_start' => [
                'label' => 'Waktu Mulai', 'rules' => 'required|regex_match[[0-9][0-9]:[0-9][0-9]]',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'regex_match' => 'Pola {field} harus sesuai dengan yang ada di list']
            ],
            'time_end' => [
                'label' => 'Waktu Selesai', 'rules' => 'required|regex_match[[0-9][0-9]:[0-9][0-9]]',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'regex_match' => 'Pola {field} harus sesuai dengan yang ada di list']
            ],
        ];
    }
    public function insertData()
    {
        $ruleRightTime = array('min' => '07:00', 'max' => '21:00');
        $ruleMinute = array('min' => 30, 'max' => 300);
        $ruleDay = array('min' => 1, 'max' => 14); // 1 hari / (2 minggu / 14hari)
        
        $validation = \Config\Services::validation();
        $this->setAttribute(true); // set additional to true so image is a must
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if ($isDataValid) {
            $reservation = $this->datatable;
            $userId = $this->userid;
            $userprofile = $this->userModel->where('id_user',$userId)->first();
            $type_user = $userprofile['type_user'];
            $codeReserv = 'RESV' . $userId . '.' . substr(strtoupper(uniqid()), -10);
            $labId = $this->request->getPost('id_lab');
            $tglPakai = $this->request->getPost('tgl_pakai');
            $waktuMulai = $this->request->getPost('time_start');
            $waktuAkhir = $this->request->getPost('time_end');
            $timeStart = $tglPakai . ' ' . $waktuMulai . ':00';
            $timeEnd = $tglPakai . ' ' . $waktuAkhir . ':00';
           
            // validation check for ketersediaan lab goes here
            $isNotRightPositionTime = ($waktuMulai >= $waktuAkhir);
            // if time_start >= time_end

            $isNotInRightTime = ($waktuMulai < $ruleRightTime['min'] || $waktuAkhir > $ruleRightTime['max']);
            // not in 07:00 - 21:00

            $isNotInRightMinMaxDay = $this->checkMinMaxDay($tglPakai, $waktuMulai, $ruleDay);
            // if > 1 week or < 24hour from inserted at
            
            $isNotAvailable = $this->checkCollisionReserv($timeStart,$timeEnd,$labId);
            // $query->hasInTime()
            
            $isNotInMinMaxMinute = $this->checkMinMaxMinute($waktuMulai, $waktuAkhir, $ruleMinute);
            // if < 30 menit or > 300 menit
            
            if ($isNotRightPositionTime) { // jika tidak benar pada value benar min max peminjaman 
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Waktu Mulai harus lebih kecil(awal) dari Waktu Selesai. Silakan tukar atau pilih waktu lain'
                ];
            } else if ($isNotInRightTime) { // jka tidak pada waktu yang benar
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Anda hanya bisa mengajukan reservasi lab antara jam 07.00 - 21.00'
                ];
            } else if ($isNotInRightMinMaxDay) { // jika tidak benar pada value benar min max peminjaman 
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Reservasi tidak boleh kurang 24 jam
                    dan tidak lebih 2 minggu dari waktu sekarang'
                ];
            } else if ($isNotInMinMaxMinute) { // jika tidak benar pada value benar min max peminjaman 
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Peminjaman hanya diperbolehkan minimal 30 menit dan maksimal 300 menit'
                ];
            } else if ($isNotAvailable) { // jika tidak available (karena jam itu penuh)
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Ruang Lab untuk tanggal '.$tglPakai.' antara jam ' . $waktuMulai . '-' . $waktuAkhir
                    . ' sudah ada yang memesan. Silakan pilih waktu di luar jam tersebut'
                ];
            } else { // if 
                $values = [
                    "lab_id"        => $labId,
                    "user_id"       => $userId,
                    "code_reserv"   => $codeReserv,
                    "time_start"    => date('Y-m-d H:i:s', strtotime($timeStart)),
                    "time_end"      => date('Y-m-d H:i:s', strtotime($timeEnd)),
                    "status_reserv" => "pending",
                ];
                $reservation->save($values);
                if($type_user == 'non-civitas'){
                    $orderModel = $this->orderModel;
                    $payment = $this->request->getPost('total_payment');
                    $valOrder = [
                        'code_reserv'   => $codeReserv,
                        'status_order'  => 'pending',
                        'total_payment' => $payment,
                        'thumb_order'   => ''
                    ];
                    $orderModel->save($valOrder);
                }
                $session = \Config\Services::session();
                $session->setFlashdata('success', 
                    'Berhasil reservasi lab untuk rentang waktu ' . $waktuMulai . '-' . $waktuAkhir);
                $result = ['status' => 200, 'data' => $values, 'message' => site_url('member/my-reservation')];
            }
        } else {
            $result = ['status' => 500, 'data' => $validation->getErrors(), 'message' => 'Gagal mengajukan reservasi'];
        }
        return json_encode($result);
    }
    public function myReservation()
    {
        $data['userid'] = $this->userid;
        $data['userProfile'] = $this->userModel->where('id_user',$this->userid)->first();
        return view('member/my_reservation', $data);
    }
    public function checkMinMaxDay($tgl, $waktu, $rule)
    {
        $datetime = new \DateTime("now", new \DateTimeZone("Asia/Jakarta"));
        $tglPakai = $tgl . ' ' . $waktu;
        $now = $datetime->format('m/d/Y H:i');
        $tglStart =  new \DateTime($now);
        $tglEnd = new \DateTime($tglPakai);
        $interval = $tglEnd->diff($tglStart);
        $intJam = (int)$interval->d; // for day
        return ($intJam < $rule['min'] || $intJam > $rule['max'] || $tglEnd < $tglStart);
    }
    public function checkMinMaxMinute($waktuMulai, $waktuAkhir, $rule)
    {
        $diffTime = ((strtotime($waktuAkhir) - strtotime($waktuMulai)) / 60);
        return ($diffTime < $rule['min'] || $diffTime > $rule['max']);
    }
    public function checkCollisionReserv($timeStart,$timeEnd,$labId){
        $db = \Config\Database::connect();
        $getQuery = "SELECT * FROM reservations 
            WHERE ((:timeStart: between time_start AND time_end) 
            OR (:timeEnd: between time_start AND time_end)) 
            AND (status_reserv=:status1: OR status_reserv=:status2:)
            AND (lab_id=:lab:)";
        $result = $db->query($getQuery,[
            'timeStart' => $timeStart,
            'timeEnd'   => $timeEnd,
            'lab'       => $labId,
            'status1'   => 'pending',
            'status2'   => 'verified'
        ])->getResultArray();
        // jika ada reservasi yang ada pada tabel maka dia result true untuk bahwa terdapat collision / tumbrukan
        return (count($result) > 0); 
    }
    public function changeStatus()
    {
        if ($this->req->isAJAX()) {
            $id = $this->request->getPost('id_reserv');
            $toStatus = $this->request->getPost('status');
            $reservasi = $this->datatable;
            $values = [
                'status_reserv' => $toStatus
            ];
            if($reservasi->update($id, $values)){
                if($toStatus == 'cancelled'){
                    $order = $this->orderModel;
                    $codeReserv = $this->request->getPost('code_reserv');
                    $orderData = $order->where('code_reserv',$codeReserv)->first();
                    if($orderData != null){
                        $valOrder = ['status_order' => 'cancelled'];
                        $order->update($orderData['id_order'],$valOrder);
                    }
                }
                $result = ['status' => 200, 'data' => [],'message' => 
                    'Reservasi berhasil diganti status menjadi '.$toStatus];
            }else{
                $result = ['status' => 500, 'data' => [],'message' => 
                    'Reservasi gagal diganti status'];
            }
            return json_encode($result);
        }
    }
    public function detailData($id){
        if ($this->req->isAJAX()) {
            $this->datatable->initDatatables($this->req,true);
            $data = $this->datatable->getWhereDetail('id_reserv',$id);
            $splitDateStart = explode(' ',$data[0]->time_start);
            $splitDateEnd = explode(' ',$data[0]->time_end);
            $data[0]->time_start  = substr($splitDateStart[1],0,5);
            $data[0]->time_end  = substr($splitDateEnd[1],0,5);
            $data[0]->date_booking = $splitDateStart[0];
            return json_encode($data[0]);
        }
    }
    public function getSchedule(){
        if ($this->req->isAJAX()) {
            $this->datatable->initDatatables($this->req);
            $data = $this->datatable->getDatatables();
            $datetime = new \DateTime("now", new \DateTimeZone("Asia/Jakarta"));
            $now = $datetime->format('Y-m-d H:i:s');
            $tglNow =  new \DateTime($now);

            $newData  = array_map (function($value){                
                    return [
                        'title' => $value->name_lab,
                        'start' => $value->time_start,
                        'url'   => site_url('member/my-reservations/detail/').$value->id_reserv,
                        'status'=> $value->status_reserv
                    ];
            }, $data);
            $result = [];
            foreach($newData as $val){
                $tglVal = new \DateTime($val['start']);
                if($tglVal > $tglNow){
                    array_push($result,$val);
                }
            }
            return json_encode($result);
        }
    }
}
