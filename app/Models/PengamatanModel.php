<?php

namespace App\Models;

use CodeIgniter\Model;

class PengamatanModel extends Model
{
    protected $table = 'pengamatan_hilal';
    protected $primaryKey = 'id_pengamatan_hilal';

    protected $allowedFields = [
        'bulan_hijri',
        'nama_bulan',
        'tanggal_observasi',
        'lokasi',
        'tinggi_bulan',
        'status_visibilitas',
        'dipublikasikan',
        'gambar_utama',
        'deskripsi',
        'kondisi_cuaca'
    ];

    // Mendapatkan semua pengamatan hilal yang dipublikasikan
    public function getPublishedPengamatan()
    {
        return $this->where('dipublikasikan', 1)->findAll();
    }

    // Fungsi untuk pencarian berdasarkan bulan hijriyah atau lokasi
    public function searchPengamatan($search)
    {
        return $this->like('bulan_hijri', $search)
            ->orLike('lokasi', $search)
            ->where('dipublikasikan', 1)
            ->findAll();
    }
}
