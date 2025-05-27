<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_TekananUdara extends Model
{
    protected $table = 'tekanan_udara'; // nama tabel di database
    protected $primaryKey = 'id_tekanan_udara'; // primary key

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'tgl', 'tekanan_udara', 
        'kelembaban_07', 'kelembaban_13', 'kelembaban_18', 
        'kecepatan_rata2', 'arah_terbanyak', 
        'kecepatan_terbesar', 'arah_kecepatan_terbesar'
    ];

    protected $useTimestamps = false; // ubah jika ada kolom timestamp

    function __construct()
    {
        $this->db = db_connect();
    }

    // Menampilkan semua data
    public function tampilData()
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
    public function simpanData($data)
    {
        if (empty($data['tgl']) || empty($data['tekanan_udara'])) {
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
    public function updateData($data, $where)
    {
        return $this->db->table($this->table)->update($data, $where);
    }
}
