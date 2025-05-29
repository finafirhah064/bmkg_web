<?php

namespace App\Controllers;

use App\Models\ModelTerbitTenggelam;
use App\Models\ModelPengamatanHilal;
use App\Models\ModelGambarHilal;

class Home extends BaseController
{
    public function dashboard()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin'
        ];
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }

    // ==================== TERBIT TENGGELAM ====================

    public function terbit_tenggelam()
    {
        $mb = new ModelTerbitTenggelam();
        $data = [
            'title' => 'Data Terbit Tenggelam',
            'dataMb' => $mb->tampilterbitenggelam()
        ];
        
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_terbit_tenggelam', $data);
        echo view('admin/admin_footer');
    }

    // ==================== GEMPA ====================

    public function gempa()
    {
        $data = [
            'title' => 'Data Gempa'
        ];
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_gempa');
        echo view('admin/admin_footer');
    }

    // ==================== HILAL FUNCTIONALITY ====================

    public function hilal()
    {
        $model = new ModelPengamatanHilal();
        $data = [
            'title' => 'Pengamatan Hilal',
            'pengamatan' => $model->where('dipublikasikan', 1)
                                  //->orderBy('tanggal_observasi', 'DESC')//
                                  ->orderBy('id_pengamatan_hilal', 'ASC')
                                  ->findAll()
        ];
        
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/hilal/admin_hilal', $data);
        echo view('admin/admin_footer');
    }


    public function user_dashboard()
    {
        echo view('user/user_header');
        echo view('user/user_dashboard');
        echo view('user/user_footer');
        
        // echo view('admin/admin_footer');
    }
}
