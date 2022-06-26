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
    public $userid;
    public $typeuser;
    public function __construct()
    {
        $this->datatable = new ReservationModel();
        $this->categoryModel = new CategoryModel();
        $this->labroomModel = new LabroomModel();
        $this->codeFacModel = new CodeFacilityModel();
        $this->facilityModel = new FacilityModel();
        $this->req = Services::request();
        $this->userid = 1;
        $this->typeuser = 'non-civitas';
        helper('html');
    }
    public function addReservation()
    {
        $data['category'] = $this->categoryModel->get()->getResult();
        return view('member/add_reservasi', $data);
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
                $row->status = ($isNeedPayment) ? $list->status_order : $list->status_reserv;
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
    public function checkLab($slug)
    {
        $category = $this->categoryModel->where('slug', $slug)->first();
        $data['category'] = $category;
        $data['type_user'] = $this->typeuser;
        $query = $this->labroomModel->where('category_id', $category["id_category"])->get()->getResult();
        $labroom = [];
        foreach ($query as $list) {
            $queryCodeFac = $this->codeFacModel->where('code_facility', $list->code_facility)
                ->get()->getResultArray();
            $dataIdFacility = array_map(function ($value) {
                return (int)$value['facility_id'];
            }, $queryCodeFac); // return id facilitiy []

            $facility = $this->facilityModel->getListFacility($dataIdFacility);
            $dtFacility = array_map(function ($value) {
                return $value->name_facility;
            }, $facility); // return list name facility
            $row = [];
            $row = $list;
            $row->list_facility = join(', ', $dtFacility);
            $row->label_status = ($list->status_lab == 'available') ? 'success' : 'warning';
            $labroom[] = $row;
        }
        $queryCategory = $this->labroomModel->where('category_id', $category['id_category'])
            ->get()->getResultArray();
        $arrLabId = array_map(function ($value) {
            return (int)$value['id_lab'];
        }, $queryCategory);
        $data['labroom'] = $labroom;
        $data['data_labid'] = json_encode($arrLabId);
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
                'label' => 'Waktu Mulai', 'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],
            'time_end' => [
                'label' => 'Waktu Selesai', 'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],
        ];
    }
    public function insertData()
    {
        $ruleRightTime = array('min' => '07:00', 'max' => '21:00');
        $ruleMinute = array('min' => 30, 'max' => 300);
        $ruleDay = array('min' => 1, 'max' => 14); // 1 hari / (2 minggu / 14hari)
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $this->setAttribute(true); // set additional to true so image is a must
        $validation->setRules($this->attribute);
        $isDataValid = $validation->withRequest($this->req)->run();
        if ($isDataValid) {
            $reservation = $this->datatable;
            $userId = $this->userid;
            $codeReserv = 'RESV' . $userId . '.' . substr(strtoupper(uniqid()), -10);
            $tglPakai = $this->request->getPost('tgl_pakai');
            $waktuMulai = $this->request->getPost('time_start');
            $waktuAkhir = $this->request->getPost('time_end');
            $timeStart = $tglPakai . ' ' . $waktuMulai . ':00';
            $timeEnd = $tglPakai . ' ' . $waktuAkhir . ':00';
            $values = [
                "lab_id"        => $this->request->getPost('id_lab'),
                "user_id"       => $userId,
                "code_reserv"   => $codeReserv,
                "time_start"    => date('Y-m-d H:i:s', strtotime($timeStart)),
                "time_end"      => date('Y-m-d H:i:s', strtotime($timeEnd)),
                "status_reserv" => "pending",
            ];
            // validation check for ketersediaan lab goes here

            $isNotAvailable = false;
            // $query->hasInTime()

            $isNotInRightTime = ($waktuMulai < $ruleRightTime['min'] || $waktuAkhir > $ruleRightTime['max']);
            // not in 07:00 - 21:00

            $isNotInRightMinMaxHour = $this->checkMinMaxDay($tglPakai, $waktuMulai, $ruleDay);
            // if > 1 week or < 24hour from inserted at

            $isNotRightPositionTime = ($waktuMulai >= $waktuAkhir);
            // if time_start >= time_end

            $isNotInMinMaxMinute = $this->checkMinMaxMinute($waktuMulai, $waktuAkhir, $ruleMinute);
            // if < 30 menit or > 300 menit

            if ($isNotAvailable) { // jika tidak available (karena jam itu penuh)
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Ruang Lab untuk jam ' . $waktuMulai . '-' . $waktuAkhir
                        . ' sudah ada yang memesan. Silakan pilih waktu di luar jam tersebut'
                ];
            } else if ($isNotInRightTime) { // jka tidak pada waktu yang benar
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Anda hanya bisa mengajukan reservasi lab antara jam 07.00 - 21.00'
                ];
            } else if ($isNotInRightMinMaxHour) { // jika tidak benar pada value benar min max peminjaman 
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Reservasi tidak boleh kurang 24 jam
                    dan tidak lebih 2 minggu dari waktu sekarang'
                ];
            } else if ($isNotRightPositionTime) { // jika tidak benar pada value benar min max peminjaman 
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Posisi antara waktu mulai & waktu selesai masih salah. Silakan tukar atau pilih waktu lain'
                ];
            } else if ($isNotInMinMaxMinute) { // jika tidak benar pada value benar min max peminjaman 
                $result = [
                    'status' => 500, 'data' => [],
                    'message' => 'Peminjaman hanya diperbolehkan minimal 30 menit dan maksimal 300 menit'
                ];
            } else { // if true
                $reservation->insert($values);
                // set session flash data success goes here
                $session->setFlashdata('success', 'Berhasil reservasi lab untuk rentang waktu ' . $waktuMulai . '-' . $waktuAkhir);
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
        $intJam = (int)$interval->d;
        return ($intJam < $rule['min'] || $intJam > $rule['max']);
    }
    public function checkMinMaxMinute($waktuMulai, $waktuAkhir, $rule)
    {
        $diffTime = ((strtotime($waktuAkhir) - strtotime($waktuMulai)) / 60);
        return ($diffTime < $rule['min'] || $diffTime > $rule['max']);
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
            if ($reservasi->update($id, $values)) {
                $result = ['status' => 200, 'data' => [], 'message' => 'Reservasi berhasil diganti status menjadi ' . $toStatus];
            } else {
                $result = ['status' => 500, 'data' => [], 'message' => 'Reservasi gagal diganti status'];
            }
            return json_encode($result);
        }
    }
}
