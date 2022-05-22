<?php

namespace App\Controllers;
use App\Models\MatakuliahModel;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;

class Matakuliah extends BaseController
{
    public function index()
    {
        return view('matakuliah/matakuliah');
    }
    public function getDataMakul(){
        $request = Services::request();
        $datatable = new MatakuliahModel();
        $datatable->initDatatables($request);

        if ($request->isAJAX()) {
            $data = $datatable->getDatatables();
            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }
    public function getDetailMakul($id){
        $makul = new MatakuliahModel();
		$data['makul'] = $makul->where('id_makul', $id)->first();
		
		if(!$data['makul']){
            $data['makul'] = [];
		}
        $data['id'] = $id;
        return json_encode($data);
    }
}
