<?php

namespace App\Controllers;

use App\Models\BukuTamuModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BukuTamu extends BaseController
{
    public function index()
    {
        $model = new BukuTamuModel();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['bukutamu'] = $model
                ->like('nama', $keyword)
                ->orLike('instansi', $keyword)
                ->findAll();
        } else {
            $data['bukutamu'] = $model->findAll();
        }

        $data['keyword'] = $keyword;

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/buku_tamu/admin_buku_tamu', $data);
        echo view('admin/admin_footer');
    }

    public function form()
    {
        return view('user/user_header')
            . view('user/user_buku_tamu')
            . view('user/user_footer');
    }

    public function export_excel()
    {
        $model = new BukuTamuModel();
        $data = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Instansi');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Kegiatan');
        $sheet->setCellValue('E1', 'Tanggal');
        $sheet->setCellValue('F1', 'Waktu');
        $sheet->setCellValue('G1', 'Kesan');

        // Data isi
        $row = 2;
        foreach ($data as $d) {
            $sheet->setCellValue("A$row", $d->nama ?? '-');
            $sheet->setCellValue("B$row", $d->instansi ?? '-');
            $sheet->setCellValue("C$row", $d->email ?? '-');
            $sheet->setCellValue("D$row", $d->kegiatan ?? '-');
            $sheet->setCellValue("E$row", $d->tanggal_kunjungan ?? '-');
            $sheet->setCellValue("F$row", $d->waktu_kunjungan ?? '-');
            $sheet->setCellValue("G$row", $d->kesan ?? '-');
            $row++;
        }

        // Output file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan_Buku_Tamu_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function simpan()
    {
        $model = new BukuTamuModel();

        // Ambil data dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'instansi' => $this->request->getPost('instansi'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'tanggal_kunjungan' => $this->request->getPost('tanggal_kunjungan'),
            'waktu_kunjungan' => $this->request->getPost('waktu_kunjungan'),
            'kesan' => $this->request->getPost('kesan'),
        ];

        // Simpan ke database
        $model->insert($data);

        return redirect()->back()->with('success', 'Buku tamu berhasil dikirim.');
    }
}
