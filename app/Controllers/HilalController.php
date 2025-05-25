<?php

namespace App\Controllers;

use App\Models\ModelPengamatanHilal;

class HilalController extends BaseController
{
    public function index()
    {
        $model = new ModelPengamatanHilal();
        $data = [
            'title' => 'Pengamatan Hilal',
            'pengamatan' => $model->orderBy('id_pengamatan_hilal', 'ASC')->findAll()
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav', $data);  // Pastikan data diteruskan ke view admin_nav
        echo view('admin/hilal/admin_hilal', $data);
        echo view('admin/admin_footer');
    }

public function simpan_hilal()
{
    // Validasi input (opsional)
    if (!$this->validate([
        'tahun_hijri' => 'required|numeric',
        'bulan_hijri' => 'required|numeric|less_than_equal_to[12]',
        'tanggal_observasi' => 'required|valid_date',
        'lokasi' => 'required|max_length[255]',
        'status_visibilitas' => 'required|in_list[teramati,tidak teramati,tidak dilakukan]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

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
    // Validasi input (opsional)
    if (!$this->validate([
        'tahun_hijri' => 'required|numeric',
        'bulan_hijri' => 'required|numeric|less_than_equal_to[12]',
        'tanggal_observasi' => 'required|valid_date',
        'lokasi' => 'required|max_length[255]',
        'status_visibilitas' => 'required|in_list[teramati,tidak teramati,tidak dilakukan]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

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


}
