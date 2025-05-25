<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelPengamatanHilal extends Model
{
    protected $table      = 'pengamatan_hilal';
    protected $primaryKey = 'id_pengamatan_hilal';
    
    protected $allowedFields = [
        'tahun_hijri',
        'bulan_hijri',
        'nama_bulan',
        'tanggal_observasi',
        'waktu_observasi',
        'lokasi',
        'latitude',
        'longitude',
        'ketinggian',
        'status_visibilitas',
        'deskripsi',
        'kondisi_cuaca',
        'waktu_terbenam_matahari',
        'waktu_terbenam_bulan',
        'azimuth_matahari',
        'azimuth_bulan',
        'tinggi_bulan',
        'elongasi',
        'judul_laporan',
        'isi_laporan',
        'path_dokumen',
        'dipublikasikan'
    ];
    
    protected $useTimestamps = true;
    protected $createdField  = 'dibuat_pada';
    protected $updatedField  = 'diperbarui_pada';
    
    // Validasi input
    protected $validationRules = [
        'tahun_hijri'       => 'required|numeric',
        'bulan_hijri'       => 'required|numeric|less_than_equal_to[12]',
        'tanggal_observasi' => 'required|valid_date',
        'lokasi'            => 'required|max_length[255]',
        'status_visibilitas'=> 'required|in_list[teramati,tidak teramati,tidak dilakukan]'
    ];
    
    /**
     * Ambil data yang sudah dipublikasikan
     */
    public function getPublishedData()
    {
        return $this->where('dipublikasikan', 1)
                   ->orderBy('id_pengamatan_hilal', 'ASC')
                   ->findAll();
    }
    
    /**
     * Ambil data dengan pagination
     */
    public function getPaginatedData($perPage = 10)
    {
        return $this->orderBy('id_pengamatan_hilal', 'ASC')
                   ->paginate($perPage);
    }
    
    /**
     * Ambil data berdasarkan bulan Hijriyah
     */
    public function getByHijriMonth($bulan, $tahun = null)
    {
        $builder = $this->where('bulan_hijri', $bulan);
        
        if ($tahun) {
            $builder->where('tahun_hijri', $tahun);
        }
        
        return $builder->orderBy('tahun_hijri', 'DESC')
                      ->findAll();
    }
}