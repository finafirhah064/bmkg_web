<?php

namespace App\Controllers;

use App\Models\model_temperatur;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class temperatur extends BaseController
{
    public function view_temperatur()
    {
        $model = new model_temperatur();
        $data['dataTemperatur'] = $model->tampilTemperatur();

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/Meteografi/temperatur/admin_tempertur', $data);
        echo view('admin/admin_footer');
    }

    public function form_temperatur()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/Meteografi/temperatur/admin_form_temperatur');
        echo view('admin/admin_footer');
    }

    public function form_update_temperatur($id)
    {
        $model = new model_temperatur();
        $data['temperatur'] = $model->getById($id);

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/Meteografi/temperatur/admin_update_temperatur', $data);
        echo view('admin/admin_footer');
    }

    public function save_temperatur()
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'tahun' => $this->request->getPost('tahun'),
            'tgl' => date('Y-m-d', strtotime($this->request->getPost('tgl'))),
            'temperatur_07' => $this->request->getPost('temperatur_07'),
            'temperatur_13' => $this->request->getPost('temperatur_13'),
            'temperatur_18' => $this->request->getPost('temperatur_18'),
            'rata2' => $this->request->getPost('rata2'),
            'max' => $this->request->getPost('max'),
            'min' => $this->request->getPost('min'),
            'curah_hujan_07' => $this->request->getPost('curah_hujan_07'),
            'penyinaran_matahari' => $this->request->getPost('penyinaran_matahari'),
            'peristiwa_khusus' => $this->request->getPost('peristiwa_khusus'),
        ];

        $model = new model_temperatur();
        $simpan = $model->simpanTemperatur($data);

        if ($simpan) {
            return redirect()->to('Temperatur')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data');
        }
    }

    public function update_temperatur($id)
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'tahun' => $this->request->getPost('tahun'),
            'tgl' => date('Y-m-d', strtotime($this->request->getPost('tgl'))),
            'temperatur_07' => $this->request->getPost('temperatur_07'),
            'temperatur_13' => $this->request->getPost('temperatur_13'),
            'temperatur_18' => $this->request->getPost('temperatur_18'),
            'rata2' => $this->request->getPost('rata2'),
            'max' => $this->request->getPost('max'),
            'min' => $this->request->getPost('min'),
            'curah_hujan_07' => $this->request->getPost('curah_hujan_07'),
            'penyinaran_matahari' => $this->request->getPost('penyinaran_matahari'),
            'peristiwa_khusus' => $this->request->getPost('peristiwa_khusus'),
        ];

        $model = new model_temperatur();
        $where = ['id_temperatur' => $id];
        $update = $model->updateTemperatur($data, $where);

        if ($update) {
            return redirect()->to(base_url('Temperatur'))->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data.');
        }
    }

    public function delete_temperatur($id)
    {
        $model = new model_temperatur();
        $model->hapus($id);
        return redirect()->to(site_url('Temperatur'));
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
        $model = new ModelTemperatur();
        $header = array_map('strtolower', $rows[0]);

        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            $data = array_combine($header, $row);

            $saveData = [
                'bulan' => $data['bulan'] ?? null,
                'tahun' => $data['tahun'] ?? null,
                'tgl' => isset($data['tgl']) ? date('Y-m-d', strtotime($data['tgl'])) : null,
                'temperatur_07' => $data['07:00'] ?? null,
                'temperatur_13' => $data['13:00'] ?? null,
                'temperatur_18' => $data['18:00'] ?? null,
                'rata2' => $data['rata²'] ?? null,
                'max' => $data['max'] ?? null,
                'min' => $data['min'] ?? null,
                'curah_hujan_07' => $data['curah hujan (mm)'] ?? null,
                'penyinaran_matahari' => $data['penyinaran matahari (%)'] ?? null,
                'peristiwa_khusus' => $data['peristiwa cuaca khusus'] ?? null,
            ];

            if ($saveData['tgl']) {
                $model->insert($saveData);
            }
        }

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        return redirect()->to('Temperatur')->with('success', 'Data berhasil diunggah dan disimpan.');
    }
}
