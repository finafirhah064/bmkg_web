<?php

namespace App\Controllers;

use App\Models\ModelBeritaKegiatan;
use App\Models\ModelPetir;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class petir extends BaseController
{
    public function view_petir()
    {
        $model = new ModelPetir();
        $dataPetir = $model->tampilpetir(); // Ambil semua data petir

        $data = [
            'dataPetir' => $dataPetir
        ];
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/berita_kegiatan/map', $data);
        echo view('admin/admin_footer');
    }
}