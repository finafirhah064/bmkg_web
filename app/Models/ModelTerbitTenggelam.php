<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelTerbitTenggelam extends Model
{
    protected $table = 'terbit_tenggelam'; // nama tabel di database
    protected $primaryKey = 'id_terbit_tenggelam'; // sesuaikan dengan primary key yang kamu pakai

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['tanggal', 'waktu_terbit', 'waktu_tenggelam', 'kecamatan'];

    protected $useTimestamps = false; // atau true kalau pakai created_at, updated_at

    // Menampilkan semua data
    public function tampilterbitenggelam()
    {
        return $this->db->table($this->table)->get()->getResult('array');
    }

    // Mengambil data berdasarkan ID
// Mengambil data berdasarkan ID
    public function getById($id)
    {
        return $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->get()
            ->getRow();
    }


    // Menyimpan data baru
    public function simpanterbittenggelam($table, $data)
    {
        // Validasi data
        if (empty($data['tanggal']) || empty($data['waktu_terbit']) || empty($data['waktu_tenggelam']) || empty($data['kecamatan'])) {
            return false;
        }

        return $this->db->table($table)->insert($data);
    }

    // Menghapus data berdasarkan ID
    public function hapus($id)
    {
        return $this->db->table($this->table)
            ->where($this->primaryKey, $id)
            ->delete();
    }

    // Mengedit data
    public function updateTerbitTenggelam($table, $data, $where)
    {
        return $this->db->table($table)->update($data, $where);
    }

    public function getLatestDataFiltered()
    {
        $kecamatanList = [
            'Malang',
            'Batu',
            'Kepanjen',
            'Blitar',
            'Tulungagung',
            'Jember',
            'Lumajang',
            'Banyuwangi'
        ];

        // Ambil tanggal paling baru
        $latestDate = $this->select('tanggal')
            ->orderBy('tanggal', 'DESC')
            ->limit(1)
            ->first();

        if ($latestDate) {
            return $this->where('tanggal', $latestDate['tanggal'])
                ->whereIn('kecamatan', $kecamatanList)
                ->findAll();
        }

        return []; // kalau tidak ada data
    }



}
