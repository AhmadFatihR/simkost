<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $komplainModel;

    public function __construct()
    {
        $this->komplainModel = new \App\Models\KomplainModel();

    }
    public function index()
    {
        $dataKomplain = $this->komplainModel->where('id_user', session()->get('id_user'))->findAll();
        $jumlahKomplain = count($dataKomplain);
        // dd($jumlahKomplain);

        $data = [
            'judul' => 'Beranda | SIMKOST',
            'subjudul' => 'Beranda',
            'jumlahKomplain' => $jumlahKomplain,
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/dashboard',$data);
        echo view('layout/footer');
    }
}
