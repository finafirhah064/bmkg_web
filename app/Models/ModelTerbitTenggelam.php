<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelTerbitTenggelam extends Model
{
    protected $table = 'terbit_tenggelam'; // nama tabel di DB
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilterbitenggelam()
    {
        $dataquery=$this->db->query("select * from terbit_tenggelam");
        return $dataquery->getResult();
    }
}
