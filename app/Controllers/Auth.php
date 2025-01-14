<?php
namespace App\Controllers;

use App\Models\MUser;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new MUser();
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

        $user = $this->userModel->where('email', $email)->first();

        if ($user && $user['password'] === $password) {
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
?>