<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelGambarHilal extends Model
{
    protected $table      = 'gambar_hilal';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'id_pengamatan',
        'path_gambar',
        'keterangan',
        'adalah_gambar_utama'
    ];
    
    protected $useTimestamps = false;
    
    /**
     * Ambil semua gambar untuk pengamatan tertentu
     */
    public function getGambarByPengamatan($id_pengamatan)
    {
        return $this->where('id_pengamatan', $id_pengamatan)
                   ->orderBy('adalah_gambar_utama', 'DESC')
                   ->findAll();
    }
    
    /**
     * Set gambar utama
     */
    public function setGambarUtama($id_gambar)
    {
        // Dapatkan data gambar
        $gambar = $this->find($id_gambar);
        if (!$gambar) return false;
        
        // Reset semua gambar utama untuk pengamatan ini
        $this->where('id_pengamatan', $gambar['id_pengamatan'])
             ->set(['adalah_gambar_utama' => 0])
             ->update();
        
        // Set gambar ini sebagai utama
        return $this->update($id_gambar, ['adalah_gambar_utama' => 1]);
    }
    
    /**
     * Hapus gambar dari sistem
     */
    public function deleteGambar($id_gambar)
    {
        $gambar = $this->find($id_gambar);
        if ($gambar && file_exists(FCPATH . $gambar['path_gambar'])) {
            unlink(FCPATH . $gambar['path_gambar']);
            return $this->delete($id_gambar);
        }
        return false;
    }
}