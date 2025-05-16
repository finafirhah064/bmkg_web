<?php

namespace App\Models;

use CodeIgniter\Model;



class model_tekanan_udara extends Model
{
    protected $table = 'tekanan_udara'; // nama tabel di database
    function __construct()
    {
        $this->db = db_connect();
    }

    // Menampilkan semua data
    public function tampil_tekanan_udara()
    {
        return $this->db->table($this->table)->get()->getResult();
    }

}