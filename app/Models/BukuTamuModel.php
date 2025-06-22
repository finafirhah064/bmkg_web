<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuTamuModel extends Model
{
    protected $table = 'buku_tamu';
    protected $primaryKey = 'id_buku_tamu';
    protected $allowedFields = [
        'nama',
        'email',
        'instansi',
        'kegiatan',
        'tanggal_kunjungan',
        'waktu_kunjungan',
        'kesan',
        'created_at'
    ];

    protected $returnType = 'object';
}
