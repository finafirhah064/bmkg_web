<?php

namespace App\Controllers;

use App\Models\ModelTerbitTenggelam;

class Home extends BaseController
{
    public function index()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }

    public function terbit_tenggelam()
    {
        $mb = new ModelTerbitTenggelam();
        $datamb = $mb->tampilterbitenggelam();
        $data = array('dataMb'=> $datamb,);

        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_terbit_tenggelam', $data);
        echo view('admin/admin_footer');
    }
     public function gempa()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_terbit_tenggelam');
        echo view('admin/admin_footer');
    }
}
