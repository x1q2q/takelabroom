<?php

namespace App\Controllers;
use App\Models\UserModel;
use Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;

class Staff extends BaseController
{
    public function index()
    {
        echo "halaman staff";
    }
    public function user(){
        return view('staff/user');
    }
    public function getDataUser()
    {
        $request = Services::request();
        $datatable = new UserModel();
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
    public function detailUser($id){
        $users = new UserModel();
		$data['user'] = $users->where('id_user', $id)->first();
		
		if(!$data['user']){
			throw PageNotFoundException::forPageNotFound();
		}
        return view('staff/user_detail',$data);
    }
    public function addUser(){
        return view('staff/user_add');
    }
    public function doAddUser(){
        $validation =  \Config\Services::validation();
        $attribute = [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'];
        $validation->setRules($attribute);

        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $users = new UserModel();
            $users->insert([
                "name" => $this->request->getPost('name'),
                "email" => $this->request->getPost('email'),
                "role" => $this->request->getPost('role'),
                "password" => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT)
            ]);
            return redirect('staff/user');
        }
    }
    public function editUser($id){
        $users = new UserModel();
		$data['user'] = $users->where('id_user', $id)->first();
		
		if(!$data['user']){
			throw PageNotFoundException::forPageNotFound();
		}
        return view('staff/user_edit',$data);
    }
    public function doUpdateUser($id){
        $validation =  \Config\Services::validation();
        $attribute = [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'];
        $validation->setRules($attribute);

        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $users = new UserModel();
            $users->update($id,[
                "name" => $this->request->getPost('name'),
                "email" => $this->request->getPost('email'),
                "role" => $this->request->getPost('role'),
                "password" => password_hash($this->request->getPost('password'),PASSWORD_BCRYPT)
            ]);
            return redirect('staff/user');
        }
    }
    public function deleteUser($id){
        $user = new UserModel();
        $user->delete($id);
        return redirect('staff/user');
    }
}
