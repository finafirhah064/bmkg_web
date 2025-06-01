<?php

namespace App\Controllers;

use App\Models\PengamatanModel;

class UserController extends BaseController
{
    // Menampilkan data hilal yang sudah dipublikasikan, dikelompokkan per tahun Hijriyah
    public function hilal()
    {
        $model = new PengamatanModel();

        // Ambil semua data pengamatan hilal yang dipublikasikan
        $pengamatan = $model->where('dipublikasikan', 1)->orderBy('tahun_hijri', 'DESC')->orderBy('bulan_hijri', 'DESC')->findAll();

        // Kelompokkan pengamatan hilal berdasarkan tahun Hijriyah
        $pengamatanByYear = [];
        foreach ($pengamatan as $item) {
            $year = $item['tahun_hijri'];
            if (!isset($pengamatanByYear[$year])) {
                $pengamatanByYear[$year] = [];
            }
            $pengamatanByYear[$year][] = $item;
        }

        // Return views sebagai gabungan string
        return view('user/user_header') .
               view('user/user_hilal', ['pengamatanByYear' => $pengamatanByYear]) .
               view('user/user_footer');
    }

    // Menampilkan detail laporan pengamatan hilal berdasar ID dengan foto URL online
    public function detail($id)
    {
        $model = new PengamatanModel();
        $laporan = $model->find($id);

        if (!$laporan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Laporan dengan ID $id tidak ditemukan.");
        }

        // Pastikan hanya laporan yang dipublikasikan yang dapat diakses (optional)
        if ($laporan['dipublikasikan'] != 1) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Laporan dengan ID $id tidak ditemukan.");
        }

        $data = [
            'laporan' => $laporan,
            'title' => 'Detail Laporan Hilal - ' . ($laporan['judul_laporan'] ?? 'Detail'),
        ];

        return view('user/user_header', $data) .
               view('user/user_hilal_detail', $data) .
               view('user/user_footer');
    }
}
