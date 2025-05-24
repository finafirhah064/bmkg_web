<?php

namespace App\Controllers;

use App\Models\PengajuanSuratModel;

class PengajuanSurat extends BaseController
{
    public function index()
    {
        $model = new PengajuanSuratModel();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $model->like('nama_pengaju', $keyword)
                ->orLike('no_hp', $keyword)
                ->orLike('jenis_surat', $keyword);
        }

        $data['pengajuan'] = $model->orderBy('updated_at', 'DESC')->findAll();
        $data['keyword'] = $keyword;

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/pengajuan_surat/admin_pengajuan_surat', $data);
        echo view('admin/admin_footer');
    }

    public function ubah_status($id, $status)
    {
        $model = new PengajuanSuratModel();
        $model->update($id, ['status' => $status]);

        return redirect()->to(base_url('pengajuan_surat'))->with('success', 'Status berhasil diubah.');
    }

    public function export_excel()
    {
        $model = new PengajuanSuratModel();
        $data = $model->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'No HP');
        $sheet->setCellValue('C1', 'Jenis Surat');
        $sheet->setCellValue('D1', 'Keperluan');
        $sheet->setCellValue('E1', 'File');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Tanggal');

        $row = 2;
        foreach ($data as $d) {
            $link = base_url('uploads/surat/' . $d['file_surat']);
            $sheet->setCellValue("A$row", $d['nama_pengaju']);
            $sheet->setCellValue("B$row", $d['no_hp']);
            $sheet->setCellValue("C$row", $d['jenis_surat']);
            $sheet->setCellValue("D$row", $d['keperluan']);
            $sheet->setCellValue("E$row", $link);
            $sheet->getCell("E$row")->getHyperlink()->setUrl($link);
            $sheet->getStyle("E$row")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
            $sheet->getStyle("E$row")->getFont()->setUnderline(true);
            $sheet->setCellValue("F$row", $d['status']);
            $sheet->setCellValue("G$row", $d['tanggal_pengajuan']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'pengajuan_surat_' . date('YmdHis') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}
