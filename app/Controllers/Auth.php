<?php

namespace App\Controllers;

class Auth extends BaseController
{
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
}
