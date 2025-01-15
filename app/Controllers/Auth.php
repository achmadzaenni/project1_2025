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

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));

        $user = $this->userModel->authenticate($email, $password);

        if ($user) {
            session()->set([
                'userid' => $user['userid'],
                'email' => $user['usernm'],
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


    public function regisAuth()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $telp = $this->request->getPost('telp');
        $alamat = $this->request->getPost('alamat');
        $password = $this->request->getPost('password');

        $this->dbs->transBegin();

        $res = array();

        try {
            $data = [
                'username' => $nama,
                'email' => $email,
                'phone' => $telp,
                'address' => $alamat,
                'password' => md5($password),
                'createdat' => date('Y-m-d H:i:s'),
                'createdby' => 1,
                'updateddat' => date('Y-m-d H:i:s'),
                'updatedby' => 1,
            ];

            if (empty($nama)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Nama wajib diisi'
                ]);
            }

            if (empty($password)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Password Wajib Diisi'
                ]);
            }

            // $existingData = $this->userModel->getOne($nama);
            // if ($existingData) {
            //     return $this->response->setJSON(['status' => 'error',
            //     'message' => 'Nama Sudah terdaftar'
            // ]);
            // }

            $this->userModel->store($data);
            $this->dbs->transCommit();

            $res = [
                'sukses' => '1',
                'pesan' => 'Berhasil Regis',
                'link' => base_url('auth/login'),
            ];
        } catch (\Throwable $th) {
            $this->dbs->transRollback();

            $res = [
                'sukses' => '0',
                'pesan' => $th->getMessage(),
                'link' => base_url('/'),
            ];
        }
        echo json_encode($res);
    }
}
