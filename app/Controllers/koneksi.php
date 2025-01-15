<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Exceptions\DatabaseException;

class koneksi extends Controller
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            $query = $db->query('SELECT 1');
            $result = $query->getResult();
            return $this->response->setJSON(['success' => true, 'message' => 'Database connection is successful.']);
        } catch (DatabaseException $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Database connection failed: ' . $e->getMessage()]);
        }
    }
}