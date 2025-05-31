<?php

namespace App\Controllers;

use App\Models\ModelTerbitTenggelam;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class Terbit_Tenggelam extends BaseController
{
    public function view_terbit_tenggelam()
    {
        $model = new ModelTerbitTenggelam();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['dataMb'] = $model->like('tanggal', $keyword)
            ->orLike('kecamatan', $keyword)
            ->findAll(); // asalkan returnType = 'array'
        } else {
            $data['dataMb'] = $model->tampilterbitenggelam();
        }

        $data['keyword'] = $keyword;

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/terbit_tenggelam/admin_terbit_tenggelam', $data);
        echo view('admin/admin_footer');
    }

    public function form_terbit_tenggelam()
    {
        // $mb = new ModelTerbitTenggelam();
        // $data['terbit_tenggelam'] = $mb->getById($id);  // Ambil data berdasarkan ID
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/terbit_tenggelam/admin_form_terbit_tenggelam');
        echo view('admin/admin_footer');
    }

    public function form_update_terbit_tenggelam($id)
    {
        $mb = new ModelTerbitTenggelam();
        $data['terbit_tenggelam'] = $mb->getById($id);
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/terbit_tenggelam/admin_update_terbit_tenggelam', $data);
        echo view('admin/admin_footer');
    }

    public function save_terbit_tenggelam()
    {
        // Ambil input dari form
        $tanggal = date('Y-m-d', strtotime($this->request->getPost('tanggal')));
        $waktuTerbit = $this->request->getPost('waktu_terbit');
        $waktuTenggelam = $this->request->getPost('waktu_tenggelam');
        $kecamatan = $this->request->getPost('kecamatan');

        // Validasi form
        if (empty($tanggal) || empty($waktuTerbit) || empty($waktuTenggelam) || empty($kecamatan)) {
            return redirect()->back()->with('error', 'Semua field wajib diisi!');
        }

        // Data yang akan disimpan
        $data = [
            'tanggal' => $tanggal,
            'waktu_terbit' => $waktuTerbit,
            'waktu_tenggelam' => $waktuTenggelam,
            'kecamatan' => $kecamatan,
        ];

        // Panggil model
        $model = new ModelTerbitTenggelam();

        // Pastikan menggunakan metode saveA dari model jika Anda sudah mendefinisikan metode ini
        $simpan = $model->simpanterbittenggelam('terbit_tenggelam', $data);  // Gunakan saveA dengan nama tabel dan data

        if (!$simpan) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            echo 'Gagal simpan. Cek struktur tabel dan data input.';
            return;
        }
        // Cek hasil
        if ($simpan) {
            return redirect()->to('TerbitTenggelam')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    // Metode untuk update data berdasarkan ID
    public function update_terbit_tenggelam($id)
    {
        // Ambil input dari form
        $tanggal = date('Y-m-d', strtotime($this->request->getPost('tanggal')));
        $waktuTerbit = $this->request->getPost('waktu_terbit');
        $waktuTenggelam = $this->request->getPost('waktu_tenggelam');
        $kecamatan = $this->request->getPost('kecamatan');

        // Data yang akan disimpan
        $data = [
            'tanggal' => $tanggal,
            'waktu_terbit' => $waktuTerbit,
            'waktu_tenggelam' => $waktuTenggelam,
            'kecamatan' => $kecamatan,
        ];

        // Set kondisi untuk update berdasarkan ID
        $where = ['id_terbit_tenggelam' => $id];

        $mb = new ModelTerbitTenggelam();
        $tabelterbittenggelam = "terbit_tenggelam";

        // Proses update
        $simpan = $mb->updateTerbitTenggelam($tabelterbittenggelam, $data, $where);

        // Check apakah update berhasil
        if ($simpan) {
            return redirect()->to(base_url('TerbitTenggelam'))->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function delete_terbit_tenggelam($id)
    {
        $mb = new ModelTerbitTenggelam();
        $mb->hapus($id);  // Panggil fungsi hapus
        return redirect()->to(site_url('TerbitTenggelam'));
    }

    public function process_upload()
    {
        $file = $this->request->getFile('excel_file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid.');
        }

        // Debug ekstensi
        $ext = $file->getClientExtension();
        if (!in_array(strtolower($ext), ['xls', 'xlsx', 'csv'])) {
            return redirect()->back()->with('error', 'Format file tidak valid.');
        }
        // Ambil file upload
        $file = $this->request->getFile('excel_file');

        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'File upload gagal.');
        }

        // Validasi ekstensi file (xls, xlsx, csv)
        $allowedExtensions = ['xls', 'xlsx', 'csv'];
        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, $allowedExtensions)) {
            return redirect()->back()->with('error', 'Format file tidak didukung. Harap unggah file Excel yang valid.');
        }

        // Pindahkan file ke folder sementara
        $randomName = $file->getRandomName(); // file123.xlsx
        $file->move(WRITEPATH . 'uploads', $randomName); // ✅ benar
        $filePath = WRITEPATH . 'uploads/' . $randomName;

        try {
            $spreadsheet = IOFactory::load($filePath);
        } catch (ReaderException $e) {
            return redirect()->back()->with('error', 'Gagal membaca file Excel: ' . $e->getMessage());
        }


        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $model = new ModelTerbitTenggelam();

        // Anggap baris pertama adalah header kolom
        $header = array_map('strtolower', $rows[0]);

        // Mulai dari baris ke-2 (index 1) adalah data
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];

            // Gabungkan header dengan isi baris untuk jadi array asosiatif
            $data = array_combine($header, $row);

            // Siapkan data sesuai struktur tabel
            $saveData = [
                'tanggal' => isset($data['tanggal']) ? date('Y-m-d', strtotime($data['tanggal'])) : null,
                'waktu_terbit' => $data['waktu_terbit'] ?? null,
                'waktu_tenggelam' => $data['waktu_tenggelam'] ?? null,
                'kecamatan' => $data['kecamatan'] ?? null,
            ];

            // Simpan data ke database bila tanggal valid
            if ($saveData['tanggal']) {
                $model->insert($saveData);
            }
        }

        // Hapus file yang telah dipindahkan setelah proses selesai (opsional)
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->to('TerbitTenggelam')->with('success', 'Data berhasil diupload dan disimpan.');
    }
}