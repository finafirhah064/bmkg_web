<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuTamuModel extends Model
{
    protected $table = 'buku_tamu';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'instansi',
        'email',
        'no_hp',
        'keperluan',
        'tanggal',
        'foto_kegiatan'
    ];
    protected $returnType = 'object';
}
