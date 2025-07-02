<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelGambarHilal extends Model
{
    protected $table = 'gambar_hilal';
    protected $primaryKey = 'id_gambar_hilal';

    protected $allowedFields = [
        'id_pengamatan_hilal',
        'path_gambar',
        'keterangan',
        'adalah_gambar_utama',
        'tahun_hijri', // kolom tahun hijriyah
        'bulan_hijri'  // kolom bulan hijriyah
    ];


    protected $useTimestamps = true;
    protected $createdField = 'dibuat_pada';
    protected $updatedField = 'diperbarui_pada';
}
