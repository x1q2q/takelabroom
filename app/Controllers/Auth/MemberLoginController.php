<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class MemberLoginController extends BaseController
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
        return view('auth/member_login');
    }
    public function setAttribute(){
        $this->attr = [
            'email' => [
                'label' => 'Email','rules' => 'required|valid_email',
                'errors' => ['required' => '{field} tidak boleh kosong',
                            'valid_email' => '{field} harus valid']],
            'password' => [
                'label' => 'Password','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
        ];
    }
    public function doLogin(){
        $validation = \Config\Services::validation();
        $session = \Config\Services::session();
        $this->setAttribute();
        $validation->setRules($this->attr);
        $isDataValid = $validation->withRequest($this->req)->run();
        if($isDataValid){
            $userModel = $this->userModel;
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $userProfile = $userModel->where('email', $email)->first();    
            $dataResponse = [];        
            if($userProfile){
                $pass = $userProfile['password'];
                $authenticatePassword = password_verify($password, $pass);
                if($authenticatePassword){
                    $ses_data = [
                        'id_user' => $userProfile['id_user'],
                        'is_login_member' => TRUE
                    ];
                    $session->set($ses_data);
                    $session->setFlashdata('success', 'Selamat datang kembali '.$userProfile['username']);
                    $message = site_url('member');          
                    $result = ['status' => 200, 'data' => $dataResponse,'message' => $message];
                }else{
                    $dataResponse = ['password' => 'Password belum benar'];
                    $result = ['status' => 500, 'data' => $dataResponse,'message' => 'Gagal Login'];
                }
            }else{
                $dataResponse = ['email' => 'Email tidak terdaftar dalam data'];
                $result = ['status' => 500, 'data' => $dataResponse,'message' => 'Gagal Login'];
            }
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Gagal login, silakan ulangi kembali'];
        }
        return json_encode($result);
    }
    public function logout(){
        $session = \Config\Services::session();
        $session->remove('is_login_member');
        $session->remove('id_user');
        return redirect()->to('member/login');
    }
}
