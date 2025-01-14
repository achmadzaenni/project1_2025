<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{
    protected $table = 'muser'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = [
        'username',
        'email',
        'phone',
        'address',
        'password',
        'createdat',
        'updatedat',
        'createdby',
        'updatedby'
    ];


    protected $useTimestamps = false; 

    public function store($data){
        return $this->insert($data);
    }
}
