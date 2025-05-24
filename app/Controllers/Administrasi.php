<?php

namespace App\Controllers;

use App\Models\AdministrasiModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class Administrasi extends BaseController
{
    public function index()


    {
        $model = new AdministrasiModel();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['dataMb'] = $model->like('nama', $keyword)
                ->orLike('nim', $keyword)
                ->orLike('universitas', $keyword)
                ->findAll();
        } else {
            $data['dataMb'] = $model->findAll();
        }

        $data['keyword'] = $keyword;

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/administrasi/admin_administrasi', $data);
        echo view('admin/admin_footer');
    }



    public function form_administrasi()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/administrasi/admin_form_administrasi');
        echo view('admin/admin_footer');
    }

    public function form_update_administrasi($id)
    {
        $model = new AdministrasiModel();
        $data['administrasi'] = $model->find($id);

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/administrasi/admin_update_administrasi', $data);
        echo view('admin/admin_footer');
    }

    public function save_administrasi()
    {
        $model = new AdministrasiModel();

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'universitas' => $this->request->getPost('universitas'),
            'jenis_kegiatan' => $this->request->getPost('jenis_kegiatan'),
            'judul' => $this->request->getPost('judul'),
            'pembimbing' => $this->request->getPost('pembimbing'),
            'stasiun_divisi' => $this->request->getPost('stasiun_divisi'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
        ];

        $file = $this->request->getFile('file_laporan');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/laporan/', $filename);
            $data['file_laporan'] = $filename;
        }


        $model->insert($data);

        return redirect()->to('administrasi')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update_administrasi($id)
    {
        $model = new AdministrasiModel();

        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'universitas' => $this->request->getPost('universitas'),
            'jenis_kegiatan' => $this->request->getPost('jenis_kegiatan'),
            'judul' => $this->request->getPost('judul'),
            'pembimbing' => $this->request->getPost('pembimbing'),
            'stasiun_divisi' => $this->request->getPost('stasiun_divisi'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
        ];

        $file = $this->request->getFile('file_laporan');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/laporan/', $filename);
            $data['file_laporan'] = $filename;
        }

        $model->update($id, $data);

        return redirect()->to('administrasi')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete_administrasi($id)
    {
        $model = new AdministrasiModel();
        $model->delete($id);

        return redirect()->to('administrasi')->with('success', 'Data berhasil dihapus.');
    }

    public function export_excel()
    {
        $model = new AdministrasiModel();
        $data = $model->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'NIM');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Universitas');
        $sheet->setCellValue('D1', 'Jenis Kegiatan');
        $sheet->setCellValue('E1', 'Judul');
        $sheet->setCellValue('F1', 'Pembimbing');
        $sheet->setCellValue('G1', 'Stasiun Divisi');
        $sheet->setCellValue('H1', 'Tanggal Mulai');
        $sheet->setCellValue('I1', 'Tanggal Selesai');
        $sheet->setCellValue('J1', 'File Laporan');


        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue("A{$row}", $item->nim);
            $sheet->setCellValue("B{$row}", $item->nama);
            $sheet->setCellValue("C{$row}", $item->universitas);
            $sheet->setCellValue("D{$row}", $item->jenis_kegiatan);
            $sheet->setCellValue("E{$row}", $item->judul);
            $sheet->setCellValue("F{$row}", $item->pembimbing);
            $sheet->setCellValue("G{$row}", $item->stasiun_divisi);
            $sheet->setCellValue("H{$row}", $item->tanggal_mulai);
            $sheet->setCellValue("I{$row}", $item->tanggal_selesai);

            // Tambahkan hyperlink di kolom J
            $link = base_url('uploads/laporan/' . $item->file_laporan);
            $sheet->setCellValue("J{$row}", $link);
            $sheet->getCell("J{$row}")->getHyperlink()->setUrl($link);
            $sheet->getStyle("J{$row}")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
            $sheet->getStyle("J{$row}")->getFont()->setUnderline(true);

            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_administrasi_' . date('Ymd') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function process_upload()
    {
        $file = $this->request->getFile('excel_file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid.');
        }

        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, ['xls', 'xlsx', 'csv'])) {
            return redirect()->back()->with('error', 'Format file tidak didukung.');
        }

        $randomName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $randomName);
        $filePath = WRITEPATH . 'uploads/' . $randomName;

        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membaca file Excel.');
        }

        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $model = new \App\Models\AdministrasiModel();

        $header = array_map('strtolower', $rows[0]);

        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            $data = array_combine($header, $row);

            $model->insert([
                'nim' => $data['nim'] ?? '',
                'nama' => $data['nama'] ?? '',
                'universitas' => $data['universitas'] ?? '',
                'jenis_kegiatan' => $data['jenis_kegiatan'] ?? '',
                'judul' => $data['judul'] ?? '',
                'pembimbing' => $data['pembimbing'] ?? '',
                'stasiun_divisi' => $data['stasiun_divisi'] ?? '',
                'tanggal_mulai' => isset($data['tanggal_mulai']) ? date('Y-m-d', strtotime($data['tanggal_mulai'])) : null,
                'tanggal_selesai' => isset($data['tanggal_selesai']) ? date('Y-m-d', strtotime($data['tanggal_selesai'])) : null,
                'file_laporan' => '', // Kosongkan karena tidak diunggah via excel
            ]);
        }

        unlink($filePath); // Hapus file sementara

        return redirect()->to('administrasi')->with('success', 'Data Excel berhasil diunggah.');
    }
}
