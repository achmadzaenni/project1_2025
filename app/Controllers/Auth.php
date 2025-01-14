<?php

namespace App\Controllers;

class Auth extends BaseController
{

    public function __construct(){

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
        return view('template/login',$data);
    }

    public function regisAuth(){
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $telp = $this->request->getPost('telp');
        $alamat = $this->request->getPost('alamat');
        $password = $this->request->getPost('password');

        // $this->;
    }
}
