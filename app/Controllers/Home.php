<?php

namespace App\Controllers;

use App\Models\Model_TekananUdara;
use App\Models\Model_temperatur;
use App\Models\ModelGempa;
use App\Models\ModelTerbitTenggelam;
use App\Models\ModelPengamatanHilal;
use App\Models\ModelGambarHilal;
use App\Models\ModelBeritaKegiatan;

class Home extends BaseController
{
    // ==================== Admin Dashboard ====================
    public function dashboard()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }

    public function index()
    {
        $data = ['title' => 'Dashboard Admin'];
        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }

    // ==================== Terbit Tenggelam ====================
    public function terbit_tenggelam()
    {
        $mb = new ModelTerbitTenggelam();
        $data = [
            'title'   => 'Data Terbit Tenggelam',
            'dataMb'  => $mb->tampilterbitenggelam()
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_terbit_tenggelam', $data);
        echo view('admin/admin_footer');
    }

    // ==================== Data Gempa (Admin) ====================
    public function gempa()
    {
        $data = ['title' => 'Data Gempa'];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/admin_gempa');
        echo view('admin/admin_footer');
    }

    // ==================== Pengamatan Hilal ====================
    public function hilal()
    {
        $model = new ModelPengamatanHilal();
        $data = [
            'title'       => 'Pengamatan Hilal',
            'pengamatan'  => $model->where('dipublikasikan', 1)
                                   ->orderBy('id_pengamatan_hilal', 'ASC')
                                   ->findAll()
        ];

        echo view('admin/admin_header', $data);
        echo view('admin/admin_nav');
        echo view('admin/hilal/admin_hilal', $data);
        echo view('admin/admin_footer');
    }

    // ==================== User Dashboard ====================
    public function user_dashboard()
    {
        // Tekanan Udara
        $tekananModel = new Model_TekananUdara();
        $today = $tekananModel->getTodayPressure();
        $data['tekanan']          = $today['tekanan_udara'] ?? '-';
        $data['kelembaban_07']    = $today['kelembaban_07'] ?? '-';
        $data['kecepatan_rata2']  = $today['kecepatan_rata2'] ?? '-';
        $data['arah_terbanyak']   = $today['arah_terbanyak'] ?? '-';
        $data['rata_tekanan']     = $tekananModel->getRataRataBulanSebelumnya();
        helper('bulan');

        // Temperatur & Curah Hujan
        $temperaturModel = new Model_temperatur();
        $temperaturToday = $temperaturModel->getTodaytemperature();
        $data['temperatur']   = $temperaturToday['temperatur_07'] ?? '-';
        $data['curah_hujan']  = $temperaturToday['curah_hujan_07'] ?? '-';

        // Data Terbit & Tenggelam
        $modelTerbit = new ModelTerbitTenggelam();
        $data['dataTerbit'] = $modelTerbit->getLatestDataFiltered();
        $latest = $modelTerbit->select('tanggal')->orderBy('tanggal', 'DESC')->first();
        $data['lastUpdate'] = $latest['tanggal'] ?? null;

        // Data Gempa dari API BMKG
        $apiUrl = "https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json";
        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get($apiUrl);
            $gempaData = json_decode($response->getBody(), true);
            $data['gempa_bmkg'] = $gempaData['Infogempa']['gempa'] ?? null;
        } catch (\Exception $e) {
            $data['gempa_bmkg'] = null;
        }

        // Berita Kegiatan
        helper('text');
        $model = new ModelBeritaKegiatan();
        $data['berita'] = $model->orderBy('tanggal', 'DESC')->findAll(10);

        echo view('user/user_header', $data);
        echo view('user/user_dashboard', $data);
        echo view('user/user_footer');
    }

    // ==================== Tentang BMKG ====================
    public function tentang_bmkg()
    {
        echo view('user/user_header');
        echo view('user/tentang_bmkg/user_tentangbmkg');
        echo view('user/user_footer');
    }
}
