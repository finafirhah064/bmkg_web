<?php

namespace App\Controllers;

use App\Models\model_tekanan_udara;
use App\Models\ModelTerbitTenggelam;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;

class tekanan_udara extends BaseController
{
    public function view_tekanan_udara()
    {
        $mb = new model_tekanan_udara();
        $datamb = $mb->tampil_tekanan_udara();
        $data = array('dataMb' => $datamb, );

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_tekanan_udara', $data);
        echo view('admin/admin_footer');
    }
}