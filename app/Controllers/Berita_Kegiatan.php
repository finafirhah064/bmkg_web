<?php

namespace App\Controllers;

use App\Models\ModelBeritaKegiatan;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class Berita_Kegiatan extends BaseController
{
    public function view_beritakegiatan()
    {
        $mb = new ModelBeritaKegiatan();
        $datamb = $mb->tampilberitakegiatan();
        $data = array('dataMb' => $datamb, );

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_beritakegiatan', $data);
        echo view('admin/admin_footer');
    }

    public function form_beritakegiatan()
    {
        // $mb = new ModelTerbitTenggelam();
        // $data['terbit_tenggelam'] = $mb->getById($id);  // Ambil data berdasarkan ID
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_form_beritakegiatan');
        echo view('admin/admin_footer');
    }

    public function form_update_beritakegiatan($id)
    {
        $mb = new ModelBeritaKegiatan();
        $data['berita_kegiatan'] = $mb->getById($id);
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_update_beritakegiatan', $data);
        echo view('admin/admin_footer');
    }

    public function save_beritakegiatan()
    {
        // Isi tanggal otomatis (hari ini)
        $tanggal = date('Y-m-d'); // tidak ambil dari input form
        // Ambil input lainnya
        $judul = $this->request->getPost('judul');
        $isi = $this->request->getPost('isi');
        $gambar = $this->request->getFile('gambar');

        // Validasi
        if (empty($judul) || empty($isi)) {
            return redirect()->back()->with('error', 'Judul dan isi wajib diisi!');
        }
        // Default null
        $namaGambar = null;

        // Validasi upload file
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getClientName();
            if (!$gambar->move('uploads/berita', $namaGambar)) {
                echo $gambar->getErrorString(); // debug error upload
                return;
            }
        } else {
            echo "Upload gagal: tidak valid atau sudah dipindah.";
            return;
        }


        // Data untuk disimpan
        $data = [
            'tanggal' => $tanggal,
            'gambar' => $namaGambar,
            'judul' => $judul,
            'isi' => $isi,
        ];

        // Simpan data
        $model = new ModelBeritaKegiatan();
        $simpan = $model->simpanberitakegiatan('berita_kegiatan', $data);

        if (!$simpan) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            echo 'Gagal simpan. Cek struktur tabel dan data input.';
            return;
        }

        // Berhasil
        return redirect()->to('form/BeritaKegiatan')->with('success', 'Data berhasil disimpan');
    }


    public function delete_beritakegiatan($id)
    {
        $mb = new ModelBeritaKegiatan();
        $mb->hapus($id);  // Panggil fungsi hapus
        return redirect()->to(site_url('BeritaKegiatan'));
    }

    // Metode untuk update data berdasarkan ID
    public function update_beritakegiatan($id)
    {
        $tanggal = date('Y-m-d');
        $judul = $this->request->getPost('judul');
        $isi = $this->request->getPost('isi');
        $gambar = $this->request->getFile('gambar');

        $mb = new ModelBeritaKegiatan();
        $tabel = "berita_kegiatan";

        // Ambil data lama dari DB
        $dataLama = $mb->getById($id); // pastikan kamu punya method getById() di model
        $namaGambar = $dataLama->gambar; // default pakai nama lama

        // Jika upload file baru
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaBaru = $gambar->getRandomName();
            $gambar->move('uploads/berita', $namaBaru);

            // (Opsional) Hapus gambar lama
            if ($namaGambar && file_exists('uploads/berita/' . $namaGambar)) {
                unlink('uploads/berita/' . $namaGambar);
            }

            $namaGambar = $namaBaru;
        }

        // Data untuk disimpan
        $data = [
            'tanggal' => $tanggal, 
            'judul' => $judul,
            'isi' => $isi,
            'gambar' => $namaGambar,
        ];

        $where = ['id_berita' => $id];
        $simpan = $mb->updateberitakegiatan($tabel, $data, $where);

        if ($simpan) {
            return redirect()->to(base_url('BeritaKegiatan'))->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }

}