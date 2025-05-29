<?php

namespace App\Controllers;

use App\Models\PengamatanModel;

class UserController extends BaseController
{
    // Menampilkan data hilal
    public function hilal()
    {
        $model = new PengamatanModel();

        // Ambil semua data pengamatan hilal yang dipublikasikan
        $pengamatan = $model->where('dipublikasikan', 1)->findAll();

        // Kelompokkan pengamatan hilal berdasarkan tahun Hijriyah
        $pengamatanByYear = [];
        foreach ($pengamatan as $item) {
            $year = $item['tahun_hijri'];
            if (!isset($pengamatanByYear[$year])) {
                $pengamatanByYear[$year] = [];
            }
            $pengamatanByYear[$year][] = $item;
        }

        // Return views as an array
        return view('user/user_header') .
               view('user/user_hilal', ['pengamatanByYear' => $pengamatanByYear]) .
               view('user/user_footer');
    }
}
