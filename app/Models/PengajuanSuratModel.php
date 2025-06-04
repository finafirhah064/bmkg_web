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
        'tanggal_pengajuan'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'tanggal_pengajuan';
    protected $updatedField = 'updated_at';

    // Fungsi untuk mencari berdasarkan nama pengaju
    public function cariByNama($nama)
    {
        return $this->like('nama_pengaju', $nama, 'both')->findAll();
    }

    // Fungsi untuk mendapatkan data dengan status tertentu
    public function getByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    // Fungsi untuk mendapatkan statistik
    public function getStatistik()
    {
        return [
            'total' => $this->countAll(),
            'pending' => $this->where('status', 'Pending')->countAllResults(false),
            'disetujui' => $this->where('status', 'Disetujui')->countAllResults(false),
            'ditolak' => $this->where('status', 'Ditolak')->countAllResults(false)
        ];
    }
}
