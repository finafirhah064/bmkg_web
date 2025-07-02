<?php

namespace App\Controllers;

use App\Models\ModelGempa;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class Gempa extends BaseController
{

    public function index()
    {
        return $this->view_gempa();
    }

    public function view_gempa()
    {
        $model = new ModelGempa();
        $dataGempa = $model->findAll();

        $data = [
            'title' => 'Data Gempa',
            'dataGempa' => $dataGempa
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/gempa/admin_gempa', $data);
        echo view('admin/admin_footer');
    }

    public function form()
    {
        $data = ['title' => 'Tambah Data Gempa'];
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/gempa/admin_form_gempa');
        echo view('admin/admin_footer');
    }

    public function form_update($id)
    {
        $model = new ModelGempa();
        $data = [
            'title' => 'Update Data Gempa',
            'gempa' => $model->find($id)
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/gempa/admin_update_gempa', $data);
        echo view('admin/admin_footer');
    }

    public function save()
    {
        $model = new ModelGempa();

        $lintang = $this->request->getPost('lintang');
        $bujur = $this->request->getPost('bujur');
        $depth = $this->request->getPost('depth');
        $magnitudo = $this->request->getPost('magnitudo');

        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'lintang' => $lintang,
            'bujur' => $bujur,
            'depth' => $depth,
            'magnitudo' => $magnitudo,
            'keterangan' => $this->request->getPost('keterangan'),
            'dirasakan' => $this->request->getPost('dirasakan')
        ];

        // Cek jika ada field kosong
        if (in_array(null, $data, true) || in_array('', $data, true)) {
            return redirect()->back()->with('error', 'Semua field wajib diisi!');
        }

        // Validasi latitude dan longitude
        if (!is_numeric($lintang) || $lintang < -90 || $lintang > 90) {
            return redirect()->back()->with('error', 'Latitude harus bernilai antara -90 dan 90.');
        }

        if (!is_numeric($bujur) || $bujur < -180 || $bujur > 180) {
            return redirect()->back()->with('error', 'Longitude harus bernilai antara -180 dan 180.');
        }

        if (!is_numeric($depth) || $depth < -180 || $depth > 180) {
            return redirect()->back()->with('error', 'Longitude harus bernilai antara -180 dan 180.');
        }

        if (!is_numeric($magnitudo) || $magnitudo < -180 || $magnitudo > 180) {
            return redirect()->back()->with('error', 'Longitude harus bernilai antara -180 dan 180.');
        }

        // Simpan ke database
        $model->insert($data);
        return redirect()->to('Gempa')->with('success', 'Data berhasil disimpan.');
    }


    public function update($id)
    {
        $model = new ModelGempa();
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'lintang' => $this->request->getPost('lintang'),
            'bujur' => $this->request->getPost('bujur'),
            'depth' => $this->request->getPost('depth'),
            'magnitudo' => $this->request->getPost('magnitudo'),
            'keterangan' => $this->request->getPost('keterangan'),
            'dirasakan' => $this->request->getPost('dirasakan')
        ];

        $model->update($id, $data);
        return redirect()->to('Gempa')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new ModelGempa();
        $model->delete($id);
        return redirect()->to('Gempa')->with('success', 'Data berhasil dihapus.');
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
        $model = new ModelGempa();

        for ($i = 1; $i < count($rows); $i++) {
            $row = array_combine($header, $rows[$i]);
            $data = [
                'tanggal' => isset($row['tanggal']) ? date('Y-m-d', strtotime($row['tanggal'])) : null,
                'jam' => $row['jam'] ?? null,
                'lintang' => $row['lintang'] ?? null,
                'bujur' => $row['bujur'] ?? null,
                'depth' => $row['depth'] ?? null,
                'magnitudo' => $row['magnitudo'] ?? null,
                'keterangan' => $row['keterangan'] ?? null,
                'dirasakan' => $row['dirasakan'] ?? null,
            ];

            if (!in_array(null, $data, true)) {
                $model->insert($data);
            }
        }

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->to('Gempa')->with('success', 'Data berhasil diupload dan disimpan.');
    }
}
