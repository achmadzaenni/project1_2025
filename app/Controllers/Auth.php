<?php

namespace App\Controllers;

use App\Models\MUser;
use Exception;

class Auth extends BaseController
{
    protected $userModel;
    protected $dbs;
    public function __construct()
    {
        $this->userModel = new MUser();
        $this->dbs = db_connect();
    }


    public function index()
    {
        $data = [
            'title' => 'Registrasi'
        ];
        return view('template/index', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('template/login', $data);
    }

    public function regisAuth(){
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $telp = $this->request->getPost('phone');
        $alamat = $this->request->getPost('alamat');
        $password = $this->request->getPost('password');
    
        $this->dbs->transBegin();
    
        $res = array();
    
        try {

            if(empty($nama) || empty($email) || empty($telp) || empty($alamat) || empty($password)){
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Data tidak boleh kosong',
                ]);
            }

            $existingdata = $this->userModel->getOne($email);
            if($existingdata){
                return $this->response->setJSON([
                    'status'=> 'error',
                    'message' => 'Anda sudah terdaftar'
                ]);
            }

            $data = [
                'username' => $nama,
                'email' => $email,
                'phone' => $telp,
                'address' => $alamat,
                'password' => md5($password),
                'createdat' => date('Y-m-d H:i:s'),
                'updatedat' => date('Y-m-d H:i:s'),
                'createdby' => 1
            ];
    
            $this->userModel->store($data);
            $this->dbs->transCommit();

            $res = [
                'sukses' => '1',
                'pesan' => 'Berhasil Regis',
                'link' => base_url('auth/login'),
            ];
        } catch (\Throwable $th) {
            $this->dbs->transRollback();
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Registrasi gagal!'
            ]);
        }
        echo json_encode($res);
    }
    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));

        $user = $this->userModel->authenticate($email, $password);

        if ($user) {
            session()->set([
                'id' => $user['id'],
                'email' => $user['email'],
                'logged_in' => true,
            ]);

            return $this->response->setJSON(['success' => true, 'message' => 'Login Berhasil']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Salah email atau password']);
        }
    }

    public function page()
    {
        $data = [
            'title' => 'Rahasia'
        ];
        return view('page', $data);
    }

}
