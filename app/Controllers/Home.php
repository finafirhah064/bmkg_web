<?php

namespace App\Controllers;

use App\Models\ModelTerbitTenggelam;
use App\Models\ModelPengamatanHilal;
use App\Models\ModelGambarHilal;

class Home extends BaseController
{
    public function dashboard()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin'
        ];
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }

    // ==================== TERBIT TENGGELAM ====================

    public function terbit_tenggelam()
    {
        $mb = new ModelTerbitTenggelam();
        $data = [
            'title' => 'Data Terbit Tenggelam',
            'dataMb' => $mb->tampilterbitenggelam()
        ];
        
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_terbit_tenggelam', $data);
        echo view('admin/admin_footer');
    }

    // ==================== GEMPA ====================

    public function gempa()
    {
        $data = [
            'title' => 'Data Gempa'
        ];
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_gempa');
        echo view('admin/admin_footer');
    }

    // ==================== HILAL FUNCTIONALITY ====================

    public function hilal()
    {
        $model = new ModelPengamatanHilal();
        $data = [
            'title' => 'Pengamatan Hilal',
            'pengamatan' => $model->where('dipublikasikan', 1)
                                  //->orderBy('tanggal_observasi', 'DESC')//
                                  ->orderBy('id_pengamatan_hilal', 'ASC')
                                  ->findAll()
        ];
        
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_hilal', $data);
        echo view('admin/admin_footer');
    }

    public function simpan_hilal()
    {
        $model = new ModelPengamatanHilal();
        
        $data = [
            'tahun_hijri' => $this->request->getPost('tahun_hijri'),
            'bulan_hijri' => $this->request->getPost('bulan_hijri'),
            'nama_bulan' => $this->request->getPost('nama_bulan'),
            'tanggal_observasi' => $this->request->getPost('tanggal_observasi'),
            'waktu_observasi' => $this->request->getPost('waktu_observasi'),
            'lokasi' => $this->request->getPost('lokasi'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'ketinggian' => $this->request->getPost('ketinggian'),
            'status_visibilitas' => $this->request->getPost('status_visibilitas'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kondisi_cuaca' => $this->request->getPost('kondisi_cuaca'),
            'waktu_terbenam_matahari' => $this->request->getPost('waktu_terbenam_matahari'),
            'waktu_terbenam_bulan' => $this->request->getPost('waktu_terbenam_bulan'),
            'azimuth_matahari' => $this->request->getPost('azimuth_matahari'),
            'azimuth_bulan' => $this->request->getPost('azimuth_bulan'),
            'tinggi_bulan' => $this->request->getPost('tinggi_bulan'),
            'elongasi' => $this->request->getPost('elongasi'),
            'judul_laporan' => $this->request->getPost('judul_laporan'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
            'dipublikasikan' => $this->request->getPost('dipublikasikan') ? 1 : 0
        ];

        $model->insert($data);
        return redirect()->to(base_url('hilal'))->with('success', 'Data pengamatan hilal berhasil disimpan');
    }

    public function update_hilal($id)
    {
        $model = new ModelPengamatanHilal();
        
        $data = [
            'tahun_hijri' => $this->request->getPost('tahun_hijri'),
            'bulan_hijri' => $this->request->getPost('bulan_hijri'),
            'nama_bulan' => $this->request->getPost('nama_bulan'),
            'tanggal_observasi' => $this->request->getPost('tanggal_observasi'),
            'waktu_observasi' => $this->request->getPost('waktu_observasi'),
            'lokasi' => $this->request->getPost('lokasi'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'ketinggian' => $this->request->getPost('ketinggian'),
            'status_visibilitas' => $this->request->getPost('status_visibilitas'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kondisi_cuaca' => $this->request->getPost('kondisi_cuaca'),
            'waktu_terbenam_matahari' => $this->request->getPost('waktu_terbenam_matahari'),
            'waktu_terbenam_bulan' => $this->request->getPost('waktu_terbenam_bulan'),
            'azimuth_matahari' => $this->request->getPost('azimuth_matahari'),
            'azimuth_bulan' => $this->request->getPost('azimuth_bulan'),
            'tinggi_bulan' => $this->request->getPost('tinggi_bulan'),
            'elongasi' => $this->request->getPost('elongasi'),
            'judul_laporan' => $this->request->getPost('judul_laporan'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
            'dipublikasikan' => $this->request->getPost('dipublikasikan') ? 1 : 0
        ];

        $model->update($id, $data);
        return redirect()->to(base_url('hilal'))->with('success', 'Data pengamatan hilal berhasil diperbarui');
    }

    public function delete_hilal($id)
    {
        $model = new ModelPengamatanHilal();
        $model->delete($id);
        return redirect()->to(base_url('hilal'))->with('success', 'Data pengamatan hilal berhasil dihapus');
    }

  public function gambar_hilal($id_pengamatan)
   {
        $modelHilal = new ModelPengamatanHilal();
        $modelGambar = new ModelGambarHilal();
        
        $data = [
            'title' => 'Kelola Gambar Hilal',
            'pengamatan' => $modelHilal->find($id_pengamatan),
            'gambar' => $modelGambar->where('id_pengamatan', $id_pengamatan)->findAll()
        ];
        
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_hilal_gambar', $data);
        echo view('admin/admin_footer');
    }

    public function upload_gambar_hilal()
    {
        $model = new ModelGambarHilal();
        $id_pengamatan = $this->request->getPost('id_pengamatan');
        $file = $this->request->getFile('gambar');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/hilal', $newName);

            $data = [
                'id_pengamatan' => $id_pengamatan,
                'path_gambar' => 'uploads/hilal/' . $newName,
                'keterangan' => $this->request->getPost('keterangan'),
                'adalah_gambar_utama' => $this->request->getPost('gambar_utama') ? 1 : 0
            ];

            $model->insert($data);
        }

        return redirect()->to(base_url("hilal/gambar/$id_pengamatan"))->with('success', 'Gambar berhasil diupload');
    }

    public function delete_gambar_hilal($id)
    {
        $model = new ModelGambarHilal();
        $gambar = $model->find($id);
        
        if ($gambar && file_exists(ROOTPATH . 'public/' . $gambar['path_gambar'])) {
            unlink(ROOTPATH . 'public/' . $gambar['path_gambar']);
            $model->delete($id);
            return redirect()->back()->with('success', 'Gambar berhasil dihapus');
        }
        
        return redirect()->back()->with('error', 'Gambar tidak ditemukan');
    }

    public function user_dashboard()
    {
        echo view('user/user_header');
        echo view('user/user_dashboard');
        echo view('user/user_footer');
        
        // echo view('admin/admin_footer');
    }
}
