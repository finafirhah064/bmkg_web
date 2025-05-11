<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('admin/admin_header');
        echo view('admin/admin_nav');
        echo view('admin/admin_dashboard');
        echo view('admin/admin_footer');
    }
}
