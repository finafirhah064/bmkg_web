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
public function downloadExcel()
{
    $model = new ModelPengamatanHilal();
    $data = $model->findAll();

    // Load PhpSpreadsheet library
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header row
    $sheet->setCellValue('A1', 'ID')
          ->setCellValue('B1', 'Tanggal Observasi')
          ->setCellValue('C1', 'Bulan Hijriyah')
          ->setCellValue('D1', 'Nama Bulan')
          ->setCellValue('E1', 'Lokasi')
          ->setCellValue('F1', 'Latitude')
          ->setCellValue('G1', 'Longitude')
          ->setCellValue('H1', 'Ketinggian')
          ->setCellValue('I1', 'Status Visibilitas')
          ->setCellValue('J1', 'Deskripsi')
          ->setCellValue('K1', 'Kondisi Cuaca')
          ->setCellValue('L1', 'Waktu Terbenam Matahari')
          ->setCellValue('M1', 'Waktu Terbenam Bulan')
          ->setCellValue('N1', 'Azimuth Matahari')
          ->setCellValue('O1', 'Azimuth Bulan')
          ->setCellValue('P1', 'Tinggi Bulan')
          ->setCellValue('Q1', 'Elongasi')
          ->setCellValue('R1', 'Judul Laporan')
          ->setCellValue('S1', 'Isi Laporan')
          ->setCellValue('T1', 'Dipublikasikan')
          ->setCellValue('U1', 'Waktu Observasi'); // Tidak ada kolom "updated_at"

    // Populate data
    $row = 2;
    foreach ($data as $item) {
        $sheet->setCellValue('A' . $row, $item['id_pengamatan_hilal'])
              ->setCellValue('B' . $row, date('d/m/Y', strtotime($item['tanggal_observasi'])))
              ->setCellValue('C' . $row, $item['bulan_hijri'])
              ->setCellValue('D' . $row, $item['nama_bulan'])
              ->setCellValue('E' . $row, $item['lokasi'])
              ->setCellValue('F' . $row, $item['latitude'])
              ->setCellValue('G' . $row, $item['longitude'])
              ->setCellValue('H' . $row, $item['ketinggian'])
              ->setCellValue('I' . $row, $item['status_visibilitas'])
              ->setCellValue('J' . $row, $item['deskripsi'])
              ->setCellValue('K' . $row, $item['kondisi_cuaca'])
              ->setCellValue('L' . $row, $item['waktu_terbenam_matahari'])
              ->setCellValue('M' . $row, $item['waktu_terbenam_bulan'])
              ->setCellValue('N' . $row, $item['azimuth_matahari'])
              ->setCellValue('O' . $row, $item['azimuth_bulan'])
              ->setCellValue('P' . $row, $item['tinggi_bulan'])
              ->setCellValue('Q' . $row, $item['elongasi'])
              ->setCellValue('R' . $row, $item['judul_laporan'])
              ->setCellValue('S' . $row, $item['isi_laporan'])
              ->setCellValue('T' . $row, $item['dipublikasikan'] ? 'Published' : 'Draft')
              ->setCellValue('U' . $row, $item['waktu_observasi']);
        $row++;
    }

    // Set the response header to download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="data_pengamatan_hilal.xlsx"');
    header('Cache-Control: max-age=0');

    // Write to file and send to browser
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}


public function uploadExcel()
{
    $file = $this->request->getFile('file');

    // Validasi file
    if (!$file || !$file->isValid()) {
        return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid.');
    }

    $allowedExtensions = ['xls', 'xlsx', 'csv'];
    $ext = strtolower($file->getClientExtension());
    if (!in_array($ext, $allowedExtensions)) {
        return redirect()->back()->with('error', 'Format file tidak didukung. Harap unggah file Excel yang valid.');
    }

    // Simpan sementara
    $randomName = $file->getRandomName();
    $file->move(WRITEPATH . 'uploads', $randomName);
    $filePath = WRITEPATH . 'uploads/' . $randomName;

    try {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
        return redirect()->back()->with('error', 'Gagal membaca file Excel: ' . $e->getMessage());
    }

    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    if (count($rows) < 2) {
        return redirect()->back()->with('error', 'File tidak memiliki data yang cukup.');
    }

    $model = new \App\Models\ModelPengamatanHilal();

    for ($i = 1; $i < count($rows); $i++) {
        $row = $rows[$i];

        // Normalisasi status_visibilitas
        $statusInput = strtolower(trim($row[8]));
        if (stripos($statusInput, 'tidak dilakukan') !== false) {
            $status = 'tidak dilakukan';
        } elseif (stripos($statusInput, 'tidak') !== false) {
            $status = 'tidak teramati';
        } elseif (stripos($statusInput, 'teramati') !== false) {
            $status = 'teramati';
        } else {
            $status = 'tidak teramati'; // fallback default
        }

        $saveData = [
            'tahun_hijri' => $row[2] ?? null,
            'bulan_hijri' => $row[2] ?? null,
            'nama_bulan' => $row[3] ?? null,
            'tanggal_observasi' => isset($row[1]) ? date('Y-m-d', strtotime($row[1])) : null,
            'waktu_observasi' => $row[20] ?? null,
            'lokasi' => $row[4] ?? null,
            'latitude' => $row[5] ?? null,
            'longitude' => $row[6] ?? null,
            'ketinggian' => $row[7] ?? null,
            'status_visibilitas' => $status,
            'deskripsi' => $row[9] ?? null,
            'kondisi_cuaca' => $row[10] ?? null,
            'waktu_terbenam_matahari' => $row[11] ?? null,
            'waktu_terbenam_bulan' => $row[12] ?? null,
            'azimuth_matahari' => $row[13] ?? null,
            'azimuth_bulan' => $row[14] ?? null,
            'tinggi_bulan' => $row[15] ?? null,
            'elongasi' => $row[16] ?? null,
            'judul_laporan' => $row[17] ?? null,
            'isi_laporan' => $row[18] ?? null,
            'dipublikasikan' => ($row[19] == 'Published' || $row[19] == 1) ? 1 : 0,
        ];

        // Insert ke database jika tanggal valid
        if ($saveData['tanggal_observasi']) {
            $insert = $model->insert($saveData);
            if (!$insert) {
                log_message('error', 'GAGAL INSERT: ' . json_encode($saveData));
                log_message('error', 'VALIDATION ERROR: ' . json_encode($model->errors()));
            }
        }
    }

    // Hapus file sementara
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    return redirect()->to(base_url('hilal'))->with('success', 'Data pengamatan hilal berhasil diupload dan disimpan.');
}


}
