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
        $model = new \App\Models\BukuTamuModel();
        $data = $model->findAll();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Instansi');
        $sheet->setCellValue('C1', 'No. HP');
        $sheet->setCellValue('D1', 'Kegiatan');
        $sheet->setCellValue('E1', 'Waktu');
        $sheet->setCellValue('F1', 'Foto');

        // Data
        $row = 2;
        foreach ($data as $d) {
            $sheet->setCellValue("A$row", $d->nama ?? '-');
            $sheet->setCellValue("B$row", $d->instansi ?? '-');
            $sheet->setCellValue("C$row", $d->no_hp ?? '-');
            $sheet->setCellValue("D$row", $d->kegiatan ?? '-');

            $createdAt = isset($d->created_at) && $d->created_at != null
                ? date('d-m-Y H:i', strtotime($d->created_at))
                : '-';
            $sheet->setCellValue("E$row", $createdAt);

            $link = base_url('uploads/foto_kegiatan/' . $d->foto_kegiatan);
            $sheet->setCellValue("F$row", $link);
            $sheet->getCell("F$row")->getHyperlink()->setUrl($link);
            $sheet->getStyle("F$row")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
            $sheet->getStyle("F$row")->getFont()->setUnderline(true);

            $row++;
        }



        // Download file
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Laporan_Buku_Tamu_' . date('Ymd_His') . '.xlsx';

        // Headers
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }


    public function simpan()
    {
        $model = new BukuTamuModel();

        // Ambil data form
        $nama = $this->request->getPost('nama');
        $no_hp = $this->request->getPost('no_hp');
        $instansi = $this->request->getPost('instansi');
        $kegiatan = $this->request->getPost('kegiatan');

        $fotoData = $this->request->getPost('foto_data'); // base64 dari kamera
        $fotoFile = $this->request->getFile('foto_kegiatan'); // jika upload manual
        $namaFile = null;

        // === Jika user ambil dari kamera (base64) ===
        if (!empty($fotoData)) {
            // Format: data:image/jpeg;base64,...
            $fotoData = str_replace('data:image/jpeg;base64,', '', $fotoData);
            $fotoData = base64_decode($fotoData);
            $namaFile = time() . '_' . uniqid() . '.jpg';
            file_put_contents(FCPATH . 'uploads/foto_kegiatan/' . $namaFile, $fotoData);
        }
        // === Jika user upload file manual ===
        elseif ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $namaFile = time() . '_' . $fotoFile->getRandomName();
            $fotoFile->move('uploads/foto_kegiatan', $namaFile);
        }

        // Simpan ke database
        $model->insert([
            'nama' => $nama,
            'no_hp' => $no_hp,
            'instansi' => $instansi,
            'kegiatan' => $kegiatan,
            'foto_kegiatan' => $namaFile,
            'tanggal' => date('Y-m-d')
        ]);

        return redirect()->back()->with('success', 'Buku tamu berhasil dikirim.');
    }
}
