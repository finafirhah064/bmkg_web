<?php

namespace App\Controllers;

use App\Models\ModelPetir;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class Petir extends BaseController
{
    public function view_petir()
    {
        $model = new ModelPetir();
        $dataPetir = $model->findAll();

        $data = [
            'title' => 'Data Petir',
            'dataPetir' => $dataPetir
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/petir/admin_petir', $data);
        echo view('admin/admin_footer');
    }

    public function form()
    {
        $data = ['title' => 'Tambah Data Petir'];
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/petir/admin_form_petir');
        echo view('admin/admin_footer');
    }

    public function form_update($id)
    {
        $model = new ModelPetir();
        $data = [
            'title' => 'Update Data Petir',
            'petir' => $model->find($id)
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/petir/admin_update_petir', $data);
        echo view('admin/admin_footer');
    }

    public function save()
    {
        $model = new ModelPetir();

        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu_sambaran' => $this->request->getPost('waktu_sambaran'),
            'wilayah' => $this->request->getPost('wilayah'),
            'latitude' => $latitude,
            'longitude' => $longitude,
            'jenis_petir' => $this->request->getPost('jenis_petir')
        ];

        // Cek jika ada field kosong
        if (in_array(null, $data, true) || in_array('', $data, true)) {
            return redirect()->back()->with('error', 'Semua field wajib diisi!');
        }

        // Validasi latitude dan longitude
        if (!is_numeric($latitude) || $latitude < -90 || $latitude > 90) {
            return redirect()->back()->with('error', 'Latitude harus bernilai antara -90 dan 90.');
        }

        if (!is_numeric($longitude) || $longitude < -180 || $longitude > 180) {
            return redirect()->back()->with('error', 'Longitude harus bernilai antara -180 dan 180.');
        }

        // Simpan ke database
        $model->insert($data);
        return redirect()->to('/Petir')->with('success', 'Data berhasil disimpan.');
    }


    public function update($id)
    {
        $model = new ModelPetir();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu_sambaran' => $this->request->getPost('waktu_sambaran'),
            'wilayah' => $this->request->getPost('wilayah'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'jenis_petir' => $this->request->getPost('jenis_petir')
        ];

        $model->update($id, $data);
        return redirect()->to('/Petir')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new ModelPetir();
        $model->delete($id);
        return redirect()->to('/Petir')->with('success', 'Data berhasil dihapus.');
    }

    public function upload()
    {
        $file = $this->request->getFile('excel_file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid.');
        }

        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, ['xls', 'xlsx', 'csv'])) {
            return redirect()->back()->with('error', 'Format file tidak didukung.');
        }

        $filePath = WRITEPATH . 'uploads/' . $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', basename($filePath));

        try {
            $spreadsheet = IOFactory::load($filePath);
        } catch (ReaderException $e) {
            return redirect()->back()->with('error', 'Gagal membaca file Excel: ' . $e->getMessage());
        }

        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $header = array_map('strtolower', $rows[0]);
        $model = new ModelPetir();

        for ($i = 1; $i < count($rows); $i++) {
            $row = array_combine($header, $rows[$i]);
            $data = [
                'tanggal' => isset($row['tanggal']) ? date('Y-m-d', strtotime($row['tanggal'])) : null,
                'waktu_sambaran' => $row['waktu_sambaran'] ?? null,
                'wilayah' => $row['wilayah'] ?? null,
                'latitude' => $row['latitude'] ?? null,
                'longitude' => $row['longitude'] ?? null,
                'jenis_petir' => $row['jenis_petir'] ?? null,
            ];

            if (!in_array(null, $data, true)) {
                $model->insert($data);
            }
        }

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->to('/Petir')->with('success', 'Data berhasil diupload dan disimpan.');
    }
}
