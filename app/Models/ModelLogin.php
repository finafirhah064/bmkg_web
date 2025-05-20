<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table = 'admin'; // Ubah ke tabel 'admin'
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'password', 'nama_lengkap'];
    protected $useTimestamps = false;

    public function cekLogin($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user && $password == $user['password']) {
            return $user; // akan mengandung id_admin, username, nama_lengkap
        }

        return false;
    }
}
