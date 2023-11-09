<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data =[
            'judul' => 'Login',
        ];
        echo view('layout/header', $data);
        echo view('layout/login');
        echo view('layout/footer');
    }
}
