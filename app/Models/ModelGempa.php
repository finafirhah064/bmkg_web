<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelGempa extends Model
{
    protected $table = 'hiposenter'; // nama tabel di database
    protected $primaryKey = 'id_gempa'; // sesuaikan dengan primary key yang kamu pakai

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'tanggal',
        'jam',
        'lintang',
        'bujur',
        'depth',
        'magnitudo',
        'keterangan',
        'dirasakan'
    ];

    protected $useTimestamps = false; // atau true kalau pakai created_at, updated_at
    // Tidak perlu constructor manual, Model CI4 sudah otomatis connect ke DB

    // Optional: Custom method untuk semua data
    public function getAllGempa()
    {
        return $this->findAll(); // sudah tersedia dari CI4
    }

    // Optional: Custom method untuk ambil data berdasarkan ID
    public function getGempaById($id)
    {
        return $this->find($id); // sudah tersedia dari CI4
    }

    // Tidak perlu simpanPetir, updatePetir, hapus manual
    // Gunakan insert(), update(), delete() dari bawaan CI4

    public function getLatestGempaFiltered()
    {

        // Ambil tanggal paling baru
        $latestDate = $this->select('tanggal')
            ->orderBy('tanggal', 'DESC')
            ->limit(1)
            ->first();

        if ($latestDate) {
            return $this->where('tanggal', $latestDate['tanggal'])
                ->findAll();
        }

        return []; // kalau tidak ada data
    }
}
