<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_temperatur extends Model
{
    protected $table = 'temperatur'; // nama tabel di database
    protected $primaryKey = 'id_temperatur'; // sesuaikan dengan primary key yang digunakan

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'tgl',
        'temperatur_07',
        'temperatur_13',
        'temperatur_18',
        'rata2',
        'max',
        'min',
        'curah_hujan_07',
        'penyinaran_matahari',
        'peristiwa_khusus'
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

    public function getTodaytemperature()
    {
        return $this->where('tgl', date('Y-m-d'))->asArray()->first();
    }

    // Ambil rata-rata temperatur dan curah hujan bulan sebelumnya
    public function getRataRataBulanLalu()
    {
        $bulanLalu = date('Y-m', strtotime('first day of last month'));

        return $this->db->table($this->table)
            ->select('AVG(temperatur_07) AS avg_temp_07, AVG(curah_hujan_07) AS avg_hujan')
            ->like('tgl', $bulanLalu)
            ->get()
            ->getRowArray();
    }


}
