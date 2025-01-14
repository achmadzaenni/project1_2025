<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        return view('template/index',[
            'title' => 'Registrasi',
        ]);
    }
}
