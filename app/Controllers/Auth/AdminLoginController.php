<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use Config\Services;

class AdminLoginController extends BaseController
{
    public $adminModel;
    public $req;
    public $attr;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->req = Services::request();
    }
    public function index()
    {
        return view('auth/admin_login');
    }
    public function setAttribute(){
        $this->attr = [
            'username' => [
                'label' => 'Username','rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']],
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
            $adminModel = $this->adminModel;
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $userProfile = $adminModel->where('username', $username)->first();    
            $dataResponse = [];        
            if($userProfile){
                $pass = $userProfile['password'];
                $authenticatePassword = password_verify($password, $pass);
                if($authenticatePassword){
                    $rememberme = $this->request->getPost('remember_me');
                    if(isset($rememberme)){
                        $valCookie = $userProfile['id_admin'];
                        $duration = strtotime('+7 days');
                        setcookie('id_admin',$valCookie,$duration, "/");
                    }else{
                        $ses_data = [
                            'id_admin' => $userProfile['id_admin'],
                            'is_login_admin' => TRUE
                        ];
                        $session->set($ses_data);
                    }
                    $session->setFlashdata('success', 'Selamat datang kembali '.$userProfile['username']);
                    $message = site_url('admin');          
                    $result = ['status' => 200, 'data' => $dataResponse,'message' => $message];
                }else{
                    $dataResponse = ['password' => 'Password belum benar'];
                    $result = ['status' => 500, 'data' => $dataResponse,'message' => 'Gagal Login'];
                }
            }else{
                $dataResponse = ['username' => 'Username tidak terdaftar dalam data'];
                $result = ['status' => 500, 'data' => $dataResponse,'message' => 'Gagal Login'];
            }
        }else{
            $result = ['status' => 500, 'data' => $validation->getErrors(),'message' => 'Gagal login, silakan ulangi kembali'];
        }
        return json_encode($result);
    }
    public function logout(){
        // bagian session
        $session = \Config\Services::session();
        $session->remove('is_login_admin');
        $session->remove('id_admin');
        // bagian cookie
        $valCookie = "";
        $duration = strtotime('-7 days');
        setcookie('id_admin',$valCookie,$duration, "/");
        return redirect()->to('admin/login');
    }
}
