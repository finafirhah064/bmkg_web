<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Login extends BaseController
{
    public function index()
    {
        return view('admin/login/login'); // tampilan form login
    }

    public function auth()
    {
        $model = new ModelLogin();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->cekLogin($username, $password);

        if ($user) {
            session()->set([
                'username' => $user['username'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('admin/dashboard')->with('success', 'Berhasil login');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah!');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
