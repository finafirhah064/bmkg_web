<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPetir extends Model
{
    protected $table = 'petir'; // Nama tabel di database
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array'; // Default data type
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'tanggal', 'waktu_sambaran', 'wilayah', 'latitude', 'longitude', 'jenis_petir'
    ];

    protected $useTimestamps = false;

    // Tidak perlu constructor manual, Model CI4 sudah otomatis connect ke DB

    // Optional: Custom method untuk semua data
    public function getAllPetir()
    {
        return $this->findAll(); // sudah tersedia dari CI4
    }

    // Optional: Custom method untuk ambil data berdasarkan ID
    public function getPetirById($id)
    {
        return $this->find($id); // sudah tersedia dari CI4
    }

    // Tidak perlu simpanPetir, updatePetir, hapus manual
    // Gunakan insert(), update(), delete() dari bawaan CI4
}