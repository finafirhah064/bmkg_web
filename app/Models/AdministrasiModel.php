<?php

namespace App\Models;

use CodeIgniter\Model;

class AdministrasiModel extends Model
{
    protected $table            = 'administrasi';
    protected $primaryKey       = 'id_mahasiswa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Bisa 'array' juga jika kamu mau
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nim',
        'nama',
        'universitas',
        'jenis_kegiatan',
        'judul',
        'pembimbing',
        'stasiun_divisi',
        'file_laporan',
        'tanggal_mulai',
        'tanggal_selesai',
        'created_at'
    ];

    protected $useTimestamps = false;

    // Menampilkan semua data
    public function tampilAdministrasi()
    {
        return $this->findAll(); // Lebih efisien menggunakan bawaan CI
    }

    // Mengambil data berdasarkan ID
    public function getById($id)
    {
        return $this->where($this->primaryKey, $id)->first();
    }

    // Menyimpan data baru
    public function simpanAdministrasi($data)
    {
        if (empty($data['nim']) || empty($data['nama']) || empty($data['universitas']) || empty($data['jenis_kegiatan'])) {
            return false;
        }
        return $this->insert($data);
    }

    // Mengupdate data berdasarkan ID
    public function updateAdministrasi($id, $data)
    {
        return $this->update($id, $data);
    }

    // Menghapus data berdasarkan ID
    public function hapus($id)
    {
        return $this->delete($id);
    }
}
