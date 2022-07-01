<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class DashboardController extends BaseController
{
    public $adminid;
    public $adminModel;
    public function __construct()
    {
        $this->adminid = session()->get('id_admin'); 
        $this->adminModel = new AdminModel();
        helper('html');
    }
    public function index()
    {
        $reservPending = 24;
        $kategori = [
            'jumlah' => [10,20,30],
            'namelab' => ['software eng','multimedia','computer network']
        ];
        $total = [
            'member' => [
                'activated'     => 20,
                'not_activated' => 10,
                'all'           => 30],
            'reservasi' => [
                'civitas'     => 20,
                'non_civitas' => 30,
                'all'         => 50],
            'fasilitas' => 55,
            'labroom'   => 36
        ];
        $keuntungan = [
            'year'  => '2022',
            'total' => 20000000,
            'data'  => json_encode([4500000,600000,7000000,5500000,5000000,8000000])
        ];
        $order_reservasi = [
            'key' => ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sept'],
            'value' => [35000,38000,50000,24000,12000,68000,85000,24000,24000]
        ];
        $all_reservasi = [
            'key'       => ['Senin','Selasa','Rabu','Kamis','Jumat'],
            'finished'  => [25,36,52,24,13],
            'verified'  => [12,53,51,25,12],
            'pending'   => [10,63,65,13,8],
            'cancell'   => [4,3,5,1,3]
        ];
        $keunt_reservasi = [
            'key1' => 'Civitas',
            'val1' => [100,250,350,600,700,800,200],
            'key2' => 'Non-Civitas',
            'val2' => [10,20,30,24,80,40,10],
        ];
        $data['reservasiPending'] = $reservPending;
        $data['total'] = $total;
        $data['keuntungan'] = $keuntungan;
        $data['kategori'] = json_encode($kategori);
        $data['orderReservasi'] = json_encode($order_reservasi); 
        $data['allReservasi'] = json_encode($all_reservasi); 
        $data['keuntunganReservasi'] = json_encode($keunt_reservasi);
        $data['adminProfile'] = $this->adminModel->where('id_admin',$this->adminid)->first();
        return view('admin/dashboard', $data);
    }
}
