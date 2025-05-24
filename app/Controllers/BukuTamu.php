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
        $data['bukutamu'] = $model->findAll(); // Ini yang belum ada
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/buku_tamu/admin_buku_tamu', $data); // Kirim data
        echo view('admin/admin_footer');
    }

    public function export_excel()
    {
        $model = new BukuTamuModel();
        $data = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Instansi');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'No HP');
        $sheet->setCellValue('E1', 'Keperluan');
        $sheet->setCellValue('F1', 'Tanggal');
        $sheet->setCellValue('G1', 'Foto');

        $row = 2;
        foreach ($data as $d) {
            $sheet->setCellValue("A$row", $d->nama);
            $sheet->setCellValue("B$row", $d->instansi);
            $sheet->setCellValue("C$row", $d->email);
            $sheet->setCellValue("D$row", $d->no_hp);
            $sheet->setCellValue("E$row", $d->keperluan);
            $sheet->setCellValue("F$row", $d->tanggal);

            $link = base_url('uploads/foto_kegiatan/' . $d->foto_kegiatan);
            $sheet->setCellValue("G$row", $link);
            $sheet->getCell("G$row")->getHyperlink()->setUrl($link);
            $sheet->getStyle("G$row")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
            $sheet->getStyle("G$row")->getFont()->setUnderline(true);

            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'buku_tamu_' . date('Ymd') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}
