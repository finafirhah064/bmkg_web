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

    public function save_beritakegiatan()
    {
        // Ambil input dari form
        $tanggal = date('Y-m-d', strtotime($this->request->getPost('tanggal')));
        $judul = $this->request->getPost('judul');
        $isi = $this->request->getPost('isi');

        // Validasi form
        if (empty($tanggal) || empty($judul) || empty($isi)) {
            return redirect()->back()->with('error', 'Semua field wajib diisi!');
        }

        // Data yang akan disimpan
        $data = [
            'tanggal' => $tanggal,
            'judul' => $judul,
            'isi' => $isi,
        ];

        // Panggil model
        $model = new ModelBeritaKegiatan();

        // Pastikan menggunakan metode saveA dari model jika Anda sudah mendefinisikan metode ini
        $simpan = $model->simpanberitakegiatan('berita_kegiatan', $data);  // Gunakan saveA dengan nama tabel dan data

        if (!$simpan) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            echo 'Gagal simpan. Cek struktur tabel dan data input.';
            return;
        }

        // Cek hasil
        if ($simpan) {
            return redirect()->to('form/BeritaKegiatan')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function delete_beritakegiatan($id)
    {
        $mb = new ModelBeritaKegiatan();
        $mb->hapus($id);  // Panggil fungsi hapus
        return redirect()->to(site_url('BeritaKegiatan'));
    }
}