<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class ProfileController extends BaseController
{
    public $userModel;
    public $userid;
    public $req;
    public $attr;
    public function __construct()
    {
        $this->userid = session()->get('id_user'); 
        $this->userModel = new UserModel();
        $this->req = Services::request();
    }
    public function index()
    {
        $dataProfile = $this->userModel->where('id_user',$this->userid)->first();
        $dateTimeProfile =  new \DateTime($dataProfile["created_at"]);
        $dataProfile['created_at'] = date_format($dateTimeProfile,'d F Y');
        $data['userProfile'] = $dataProfile;
        return view('member/my_profile',$data);
    }
    public function setAttribute($onImageAttribute = false){
        $this->attr = [
            'username' => [
                'label' => 'Username','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'full_name' => [
                'label' => 'Nama Lengkap','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'gender' => [
                'label' => 'Jenis Kelamin', 'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'notelp' => [
                'label' => 'No. Telepon','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'nim' => [
                'label' => 'NIM','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            ];
        if($onImageAttribute){
            $this->attr['foto_profile'] = [
                'label' => 'Foto Profile',
                'rules' => 'uploaded[foto_profile]|ext_in[foto_profile,jpg,jpeg,png]|max_size[foto_profile,2000000]',
                'errors' => [
                    'uploaded' => '{field} harap diisi jpg/jpeg/png',
                    'ext_in' => '{field} harus berupa jpg/jpeg/png',
                    'max_size' => '{field} tidak boleh melebihi batas 2Mb'
                ]
            ];
        }
    }
    public function updateProfile(){
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $id_user = $this->request->getPost('id_user');
        $oldUser = $this->userModel->where('id_user', $id_user)->first();
        if($oldUser['thumb_user'] != $this->request->getPost('profile_file_name')){
            $this->setAttribute(true);
        }else{
            $this->setAttribute(false);
        }
        $validation->setRules($this->attr);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $user = $this->userModel;
            
            $values = [
                "username" => $this->request->getPost('username'),
                "full_name" => $this->request->getPost('full_name'),
                "gender" => $this->request->getPost('gender'),
                "notelp" => $this->request->getPost('notelp'),
                "nim" => $this->request->getPost('nim')
            ];
            if($oldUser['thumb_user'] != $this->request->getPost('profile_file_name')){
                if($file = $this->request->getFile('foto_profile')) {
                    $newName = '';
                    if ($file->isValid() && ! $file->hasMoved()) {    
                    $newName = 'ava_'.$file->getRandomName(); // for file name   
                    // Store file in public ... /uploads/useres folder
                    $file->move('../public/assets/img/uploads/users', $newName);
                    }
                    $values["thumb_user"] = $newName;
                }
            }
            $user->update($id_user, $values);
            $session->setFlashdata('success', 'Biodata profil berhasil diupdate');
            $result = ['status' => 200, 'data' => $values,'message' => 'Biodata profil berhasil diupdate'];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Biodata profil gagal diupdate'];
        }
        return json_encode($result);
    }
}
