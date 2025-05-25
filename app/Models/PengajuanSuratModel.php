<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanSuratModel extends Model
{
    protected $table = 'pengajuan_surat';
    protected $primaryKey = 'id_pengajuan_surat';
    protected $allowedFields = [
        'nama_pengaju',
        'no_hp',
        'jenis_surat',
        'keperluan',
        'status',
        'file_surat',
        'tanggal_pengajuan',
        'updated_at'
    ];
    protected $useTimestamps = false; // Karena kamu menggunakan CURRENT_TIMESTAMP dari MySQL
}
