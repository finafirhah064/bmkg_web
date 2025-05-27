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
          ->setCellValue('B1', 'Tanggal')
          ->setCellValue('C1', 'Bulan Hijriyah')
          ->setCellValue('D1', 'Lokasi')
          ->setCellValue('E1', 'Tinggi Hilal')
          ->setCellValue('F1', 'Visibilitas')
          ->setCellValue('G1', 'Status')
          ->setCellValue('H1', 'Aksi');

    // Populate data
    $row = 2;
    foreach ($data as $item) {
        $sheet->setCellValue('A' . $row, $item['id_pengamatan_hilal'])
              ->setCellValue('B' . $row, date('d/m/Y', strtotime($item['tanggal_observasi'])))
              ->setCellValue('C' . $row, $item['bulan_hijri'])
              ->setCellValue('D' . $row, $item['lokasi'])
              ->setCellValue('E' . $row, $item['tinggi_bulan'])
              ->setCellValue('F' . $row, $item['status_visibilitas'])
              ->setCellValue('G' . $row, $item['dipublikasikan'] ? 'Published' : 'Draft');
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
    if ($this->request->getMethod() == 'post' && $this->validate([
        'file' => 'uploaded[file]|ext_in[file,xlsx]'
    ])) {
        $file = $this->request->getFile('file');

        // Load PhpSpreadsheet library
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getTempName());
        $sheet = $spreadsheet->getActiveSheet();

        // Loop through rows and insert data into database
        $model = new ModelPengamatanHilal();
        $row = 2;
        while ($sheet->getCell('A' . $row)->getValue() != '') {
            $data = [
                'tahun_hijri' => $sheet->getCell('A' . $row)->getValue(),
                'bulan_hijri' => $sheet->getCell('B' . $row)->getValue(),
                'nama_bulan' => $sheet->getCell('C' . $row)->getValue(),
                'tanggal_observasi' => $sheet->getCell('D' . $row)->getFormattedValue(),
                'waktu_observasi' => $sheet->getCell('E' . $row)->getFormattedValue(),
                'lokasi' => $sheet->getCell('F' . $row)->getValue(),
                'latitude' => $sheet->getCell('G' . $row)->getValue(),
                'longitude' => $sheet->getCell('H' . $row)->getValue(),
                'ketinggian' => $sheet->getCell('I' . $row)->getValue(),
                'status_visibilitas' => $sheet->getCell('J' . $row)->getValue(),
                'deskripsi' => $sheet->getCell('K' . $row)->getValue(),
                'kondisi_cuaca' => $sheet->getCell('L' . $row)->getValue(),
                'waktu_terbenam_matahari' => $sheet->getCell('M' . $row)->getFormattedValue(),
                'waktu_terbenam_bulan' => $sheet->getCell('N' . $row)->getFormattedValue(),
                'azimuth_matahari' => $sheet->getCell('O' . $row)->getValue(),
                'azimuth_bulan' => $sheet->getCell('P' . $row)->getValue(),
                'tinggi_bulan' => $sheet->getCell('Q' . $row)->getValue(),
                'elongasi' => $sheet->getCell('R' . $row)->getValue(),
                'judul_laporan' => $sheet->getCell('S' . $row)->getValue(),
                'dipublikasikan' => $sheet->getCell('T' . $row)->getValue() == 'Published' ? 1 : 0
            ];

            $model->insert($data);
            $row++;
        }

        return redirect()->to(base_url('hilal'))->with('success', 'Data pengamatan hilal berhasil diupload');
    }

    return redirect()->back()->with('error', 'File tidak valid');
}



}
