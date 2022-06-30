<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class RegistrationController extends BaseController
{
    public $userModel;
    public $req;
    public $attr;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->req = Services::request();
    }
    public function index()
    {
        return view('auth/register');
    }
    public function setAttribute(){
        $this->attr = [
            'full_name' => [
                'label' => 'Nama Lengkap','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'gender' => [
                'label' => 'Jenis Kelamin','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
            'nim' => [
                'label' => 'NIM','rules' => 'required|regex_match[^[a-zA-Z][0-9]]',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'regex_match' => 'Pola {field} tidak diijinkan']],
            'notelp' => [
                'label' => 'No. Telp','rules' => 'required|is_natural',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'regex_match' => '{field} harus berupa angka']],
            'username' => [
                'label' => 'Username','rules' => 'required|is_unique[users.username]',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'is_unique' => '{field} sudah digunakan, silakan gunakan yang lain']],
            'email' => [
                'label' => 'Email','rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'valid_email' => '{field} harus valid',
                            'is_unique' => '{field} sudah terdaftar, silakan gunakan email lain']],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus lebih dari 8 karakter'
                ]],
        ];
    }
    public function doRegister(){
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $this->setAttribute();
        $validation->setRules($this->attr);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $userModel = $this->userModel;
            $passwdPost = $this->request->getPost('password');
            $emasilPost = $this->request->getPost('email');
            $typeUser = (!preg_match('/student.uns/', $emasilPost)) 
                ? 'non-civitas':'civitas';
            $values = [
                "username"     => $this->request->getPost('username'),
                "full_name"    => $this->request->getPost('full_name'),
                "password"     => password_hash($passwdPost,PASSWORD_BCRYPT),
                "email"        => $emasilPost,
                "type_user"    => $typeUser,
                "gender"       => $this->request->getPost('gender'),
                "notelp"       => $this->request->getPost('notelp'),
                "nim"          => $this->request->getPost('nim'),
                "thumb_user"   => "",
                "is_activated" => 0,
            ];
            $userModel->insert($values);
            $session->setFlashdata('successRegister', 'Anda telah berhasil registrasi akun. Silakan masuk untuk melanjutkan');
            $result = ['status' => 200, 'data' => $values,
                'message' => site_url('member/login')];
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Gagal Registrasi, silakan ulangi kembali'];
        }
        return json_encode($result);
    }
    public function forgotPassword(){
        return view('auth/forgot_password');
    }
}
