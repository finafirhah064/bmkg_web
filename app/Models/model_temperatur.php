<?php

namespace App\Models;

use CodeIgniter\Model;

class model_temperatur extends Model
{
    protected $table = 'temperatur'; // nama tabel di database
    protected $primaryKey = 'id_temperatur'; // sesuaikan dengan primary key yang digunakan

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'bulan', 'tahun', 'tgl',
        'temperatur_07', 'temperatur_13', 'temperatur_18',
        'rata2', 'max', 'min',
        'curah_hujan_07', 'penyinaran_matahari', 'peristiwa_khusus'
    ];

    protected $useTimestamps = false; // Ubah ke true jika tabel memiliki kolom created_at dan updated_at

    function __construct()
    {
        $this->db = db_connect();
    }

    // Menampilkan semua data
    public function tampilTemperatur()
    {
        return $this->db->table($this->table)->get()->getResult();
    }

    // Mengambil data berdasarkan ID
    public function getById($id)
    {
        return $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->get()
            ->getRow();
    }

    // Menyimpan data baru
    public function simpanTemperatur($data)
    {
        // Validasi data sederhana (bisa dikembangkan sesuai kebutuhan)
        if (empty($data['tgl']) || empty($data['temperatur_07']) || empty($data['temperatur_13'])) {
            return false;
        }

        return $this->db->table($this->table)->insert($data);
    }

    // Menghapus data berdasarkan ID
    public function hapus($id)
    {
        return $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->delete();
    }

    // Mengedit data
    public function updateTemperatur($data, $where)
    {
        return $this->db->table($this->table)->update($data, $where);
    }
}
