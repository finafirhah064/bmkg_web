<?php
namespace App\Controllers;

use App\Models\ModelGambarHilal;

class GambarHilalController extends BaseController
{
    public function index()
    {
        $model = new ModelGambarHilal();
        $data = [
            'title' => 'Data Gambar Hilal',
            'gambar_hilal' => $model->findAll() // Mengambil semua gambar hilal
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav', $data);  // Pastikan data diteruskan ke view admin_nav
        echo view('admin/hilal/admin_gambar_hilal', $data); // View untuk gambar hilal
        echo view('admin/admin_footer');
    }

    public function upload_gambar()
    {
        $model = new ModelGambarHilal();
        $file = $this->request->getFile('gambar');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            // Pindahkan ke public/uploads/gambar_hilal
            $file->move(ROOTPATH . 'public/uploads/gambar_hilal', $newName);

            $data = [
                'path_gambar' => $newName,
                'keterangan' => $this->request->getPost('keterangan'),
                'adalah_gambar_utama' => $this->request->getPost('gambar_utama') ? 1 : 0,
                'tahun_hijri' => $this->request->getPost('tahun_hijri'),
                'bulan_hijri' => $this->request->getPost('bulan_hijri'),
            ];

            $model->insert($data);
            return redirect()->to(base_url('hilal/gambar'))->with('success', 'Gambar berhasil diupload');
        }

        return redirect()->back()->with('error', 'Upload gambar gagal');
    }

    public function delete_gambar($id)
    {
        $model = new ModelGambarHilal();
        $gambar = $model->find($id);

        // Pastikan gambar ditemukan sebelum dihapus
        if ($gambar) {
            // Hapus file gambar dari server (pastikan pathnya sesuai)
            if (file_exists(ROOTPATH . 'public/uploads/gambar_hilal/' . $gambar['path_gambar'])) {
                unlink(ROOTPATH . 'public/uploads/gambar_hilal/' . $gambar['path_gambar']);
            }

            // Hapus data dari database berdasarkan ID
            $model->where('id_gambar_hilal', $id)->delete();

            return redirect()->to(base_url('hilal/gambar'))->with('success', 'Gambar berhasil dihapus');
        } else {
            return redirect()->to(base_url('hilal/gambar'))->with('error', 'Gambar tidak ditemukan');
        }
    }

    public function update_gambar($id)
    {
        $model = new ModelGambarHilal();
        $gambar = $model->find($id);
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
            'adalah_gambar_utama' => $this->request->getPost('gambar_utama') ? 1 : 0
        ];

        // Cek apakah gambar baru diupload
        if ($this->request->getFile('gambar')->isValid()) {
            // Hapus gambar lama jika ada
            if (file_exists(ROOTPATH . 'public/uploads/gambar_hilal/' . $gambar['path_gambar'])) {
                unlink(ROOTPATH . 'public/uploads/gambar_hilal/' . $gambar['path_gambar']);
            }

            // Upload gambar baru
            $file = $this->request->getFile('gambar');
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/gambar_hilal', $newName);

            $data['path_gambar'] = $newName;
        }

        // Update data di database
        $model->update($id, $data);

        return redirect()->to(base_url('hilal/gambar'))->with('success', 'Gambar berhasil diperbarui');
    }
}
