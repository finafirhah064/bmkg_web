<?php

namespace App\Controllers;

use App\Models\PengajuanSuratModel;

class PengajuanSurat extends BaseController
{
    protected $pengajuanSuratModel;

    public function __construct()
    {
        $this->pengajuanSuratModel = new PengajuanSuratModel();
    }
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

    public function form()
    {
        return view('user/user_pengajuan_surat');
    }

    public function simpan()
    {
        $model = new PengajuanSuratModel();

        $fileSurat = $this->request->getFile('file_surat');
        $namaFile = '';

        if ($fileSurat && $fileSurat->isValid() && !$fileSurat->hasMoved()) {
            $namaFile = time() . '_' . $fileSurat->getClientName();
            $fileSurat->move('uploads/surat', $namaFile);
        }

        $model->insert([
            'nama_pengaju' => $this->request->getPost('nama_pengaju'),
            'no_hp' => $this->request->getPost('no_hp'),
            'jenis_surat' => $this->request->getPost('jenis_surat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'file_surat' => $namaFile,
            'status' => 'Diajukan',
            'tanggal_pengajuan' => date('Y-m-d')
        ]);

        return redirect()->to('pengajuan_surat')->with('success', 'Pengajuan surat berhasil dikirim.');
    }

    public function cek_status()
    {
        $model = new \App\Models\PengajuanSuratModel();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['surats'] = $model->like('nama_pengaju', $keyword)->findAll();
        } else {
            $data['surats'] = $model->orderBy('tanggal_pengajuan', 'DESC')->findAll();
        }

        $data['keyword'] = $keyword;

        return view('user/cek_status_surat', $data);
    }

    public function ubah_status_ajax()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getJSON()->id;
            $status = $this->request->getJSON()->status;

            $this->pengajuanSuratModel->update($id, [
                'status' => $status,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            return $this->response->setJSON(['success' => true]);
        }
        return $this->response->setJSON(['success' => false]);
    }
}
