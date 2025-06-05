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
    $file = $this->request->getFile('file'); // Menggunakan 'file' sesuai dengan name di form

    // Memeriksa apakah file valid
    if (!$file || !$file->isValid()) {
        return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid.');
    }

    // Validasi ekstensi file (xls, xlsx, csv)
    $allowedExtensions = ['xls', 'xlsx', 'csv'];
    $ext = strtolower($file->getClientExtension());
    if (!in_array($ext, $allowedExtensions)) {
        return redirect()->back()->with('error', 'Format file tidak didukung. Harap unggah file Excel yang valid.');
    }

    // Pindahkan file ke folder sementara
    $randomName = $file->getRandomName();
    $file->move(WRITEPATH . 'uploads', $randomName); // Menyimpan file di folder sementara
    $filePath = WRITEPATH . 'uploads/' . $randomName;

    try {
        // Membaca file dengan PhpSpreadsheet
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
    } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
        return redirect()->back()->with('error', 'Gagal membaca file Excel: ' . $e->getMessage());
    }

    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray(); // Mengonversi sheet ke array

    $model = new ModelPengamatanHilal();

    $header = array_map('strtolower', $rows[0]); // Mengonversi header menjadi huruf kecil untuk konsistensi

    for ($i = 1; $i < count($rows); $i++) {
        $row = $rows[$i];
        $data = array_combine($header, $row);

        // Siapkan data sesuai struktur tabel
        $saveData = [
            'tahun_hijri' => isset($data['tahun_hijri']) ? $data['tahun_hijri'] : null,
            'bulan_hijri' => isset($data['bulan_hijri']) ? $data['bulan_hijri'] : null,
            'nama_bulan' => isset($data['nama_bulan']) ? $data['nama_bulan'] : null,
            'tanggal_observasi' => isset($data['tanggal_observasi']) ? date('Y-m-d', strtotime($data['tanggal_observasi'])) : null,
            'waktu_observasi' => isset($data['waktu_observasi']) ? $data['waktu_observasi'] : null,
            'lokasi' => isset($data['lokasi']) ? $data['lokasi'] : null,
            'latitude' => isset($data['latitude']) ? $data['latitude'] : null,
            'longitude' => isset($data['longitude']) ? $data['longitude'] : null,
            'ketinggian' => isset($data['ketinggian']) ? $data['ketinggian'] : null,
            'status_visibilitas' => isset($data['status_visibilitas']) ? $data['status_visibilitas'] : null,
            'deskripsi' => isset($data['deskripsi']) ? $data['deskripsi'] : null,
            'kondisi_cuaca' => isset($data['kondisi_cuaca']) ? $data['kondisi_cuaca'] : null,
            'waktu_terbenam_matahari' => isset($data['waktu_terbenam_matahari']) ? $data['waktu_terbenam_matahari'] : null,
            'waktu_terbenam_bulan' => isset($data['waktu_terbenam_bulan']) ? $data['waktu_terbenam_bulan'] : null,
            'azimuth_matahari' => isset($data['azimuth_matahari']) ? $data['azimuth_matahari'] : null,
            'azimuth_bulan' => isset($data['azimuth_bulan']) ? $data['azimuth_bulan'] : null,
            'tinggi_bulan' => isset($data['tinggi_bulan']) ? $data['tinggi_bulan'] : null,
            'elongasi' => isset($data['elongasi']) ? $data['elongasi'] : null,
            'judul_laporan' => isset($data['judul_laporan']) ? $data['judul_laporan'] : null,
            'isi_laporan' => isset($data['isi_laporan']) ? $data['isi_laporan'] : null,
            'dipublikasikan' => isset($data['dipublikasikan']) ? ($data['dipublikasikan'] == 'Published' ? 1 : 0) : 0,
            'waktu_observasi' => isset($data['waktu_observasi']) ? date('Y-m-d', strtotime($data['waktu_observasi'])) : null,
        ];

        // Debug: Tampilkan data yang akan disimpan
        var_dump($saveData); // Tampilkan data sebelum insert

        // Simpan data ke database
        if ($saveData['tanggal_observasi']) {
            $model->insert($saveData);
        }
    }

    // Hapus file yang telah dipindahkan setelah proses selesai (opsional)
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    return redirect()->to(base_url('hilal'))->with('success', 'Data pengamatan hilal berhasil diupload dan disimpan.');
}


}
