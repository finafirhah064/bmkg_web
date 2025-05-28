<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuTamuModel extends Model
{
    protected $table = 'buku_tamu';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama',
        'no_hp',
        'instansi',
        'kegiatan',
        'foto_kegiatan',
        'tanggal_kunjungan',
        'waktu_kunjungan'
    ];

    protected $returnType = 'object';
}
