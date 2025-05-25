<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPetir extends Model
{
    protected $table = 'petir'; // nama tabel di database
    protected $primaryKey = 'id_petir'; // sesuaikan dengan primary key yang kamu pakai

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tanggal', 'waktu_sambaran', 'wilayah', 'latitude', 'longitude', 'jenis_petir'];

    protected $useTimestamps = false; // atau true kalau pakai created_at, updated_at

    function __construct()
    {
        $this->db = db_connect();
    }

    // Menampilkan semua data
    public function tampilpetir()
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
    // public function simpanberitakegiatan($table, $data)
    // {
    //     // Validasi data
    //     if (empty($data['tanggal']) || empty($data['judul']) || empty($data['isi'])) {
    //         return false;
    //     }

    //     return $this->db->table($table)->insert($data);
    // }

    // // Menghapus data berdasarkan ID
    // public function hapus($id)
    // {
    //     return $this->db->table($this->table)
    //         ->where($this->primaryKey, $id)
    //         ->delete();
    // }

    // // Mengedit data
    // public function updateberitakegiatan($table, $data, $where)
    // {
    //     return $this->db->table($table)->update($data, $where);
    // }
}