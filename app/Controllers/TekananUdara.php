<?php

namespace App\Controllers;

use App\Models\Model_TekananUdara;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class TekananUdara extends BaseController
{
    public function view()
    {
        $model = new Model_TekananUdara();
        $data['dataTekanan'] = $model->tampilData();

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/Meteografi/udara/admin_udara', $data);
        echo view('admin/admin_footer');
    }

    public function form()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/Meteografi/udara/admin_form_udara');
        echo view('admin/admin_footer');
    }

    public function form_update($id)
    {
        $model = new Model_TekananUdara();
        $data['tekanan'] = $model->getById($id);

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/Meteografi/udara/admin_update_udara', $data);
        echo view('admin/admin_footer');
    }

    public function save()
    {
        $data = [
            'tgl' => date('Y-m-d', strtotime($this->request->getPost('tgl'))),
            'tekanan_udara' => $this->request->getPost('tekanan_udara'),
            'kelembaban_07' => $this->request->getPost('kelembaban_07'),
            'kelembaban_13' => $this->request->getPost('kelembaban_13'),
            'kelembaban_18' => $this->request->getPost('kelembaban_18'),
            'kecepatan_rata2' => $this->request->getPost('kecepatan_rata2'),
            'arah_terbanyak' => $this->request->getPost('arah_terbanyak'),
            'kecepatan_terbesar' => $this->request->getPost('kecepatan_terbesar'),
            'arah_kecepatan_terbesar' => $this->request->getPost('arah_kecepatan_terbesar')
        ];

        $model = new Model_TekananUdara();
        $simpan = $model->simpanData($data);

        if ($simpan) {
            return redirect()->to('/tekananudara')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function update($id)
    {
        $data = [
            'tgl' => date('Y-m-d', strtotime($this->request->getPost('tgl'))),
            'tekanan_udara' => $this->request->getPost('tekanan_udara'),
            'kelembaban_07' => $this->request->getPost('kelembaban_07'),
            'kelembaban_13' => $this->request->getPost('kelembaban_13'),
            'kelembaban_18' => $this->request->getPost('kelembaban_18'),
            'kecepatan_rata2' => $this->request->getPost('kecepatan_rata2'),
            'arah_terbanyak' => $this->request->getPost('arah_terbanyak'),
            'kecepatan_terbesar' => $this->request->getPost('kecepatan_terbesar'),
            'arah_kecepatan_terbesar' => $this->request->getPost('arah_kecepatan_terbesar')
        ];

        $model = new Model_TekananUdara();
        $where = ['id_tekanan_udara' => $id];
        $update = $model->updateData($data, $where);

        if ($update) {
            return redirect()->to('/tekananudara')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data');
        }
    }

    public function delete($id)
    {
        $model = new Model_TekananUdara();
        $model->hapus($id);
        return redirect()->to('/tekananudara')->with('success', 'Data berhasil dihapus');
    }

    public function upload_excel()
    {
        $file = $this->request->getFile('excel_file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak valid.');
        }

        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, ['xls', 'xlsx', 'csv'])) {
            return redirect()->back()->with('error', 'Format file tidak didukung.');
        }

        $randomName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $randomName);
        $filePath = WRITEPATH . 'uploads/' . $randomName;

        try {
            $spreadsheet = IOFactory::load($filePath);
        } catch (ReaderException $e) {
            return redirect()->back()->with('error', 'Gagal membaca file: ' . $e->getMessage());
        }

        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        $model = new Model_TekananUdara();

        $header = array_map('strtolower', $rows[0]);

        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            $data = array_combine($header, $row);

            $saveData = [
                'tgl' => isset($data['tgl']) ? date('Y-m-d', strtotime($data['tgl'])) : null,
                'tekanan_udara' => $data['tekanan udara (dalam mb)'] ?? null,
                'kelembaban_07' => $data['lembab nisbi 07.00'] ?? null,
                'kelembaban_13' => $data['lembab nisbi 13.00'] ?? null,
                'kelembaban_18' => $data['lembab nisbi 18.00'] ?? null,
                'kecepatan_rata2' => $data['kecepatan rata (km/jam)'] ?? null,
                'arah_terbanyak' => $data['arah terbanyak'] ?? null,
                'kecepatan_terbesar' => $data['kecepatan terbesar (knots)'] ?? null,
                'arah_kecepatan_terbesar' => $data['arah'] ?? null,
            ];

            if ($saveData['tgl']) {
                $model->insert($saveData);
            }
        }

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->to('/tekananudara')->with('success', 'Data berhasil diunggah dan disimpan.');
    }
}
