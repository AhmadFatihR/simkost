<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $kamarModel;
    protected $penghuniModel;
    protected $komplainModel;
    public function __construct()
    {
        $this->kamarModel = new \App\Models\KamarModel();
        $this->penghuniModel = new \App\Models\PenghuniModel();
        $this->komplainModel = new \App\Models\KomplainModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Beranda | SIMKOST',
            'subjudul' => 'Beranda',
            'jumlah_kamar' => $this->kamarModel->getJumlahKamar(),
            'jumlah_penghuni' => $this->penghuniModel->getJumlahPenghuni(),
            'jumlah_komplain' => $this->komplainModel->getJumlahKomplain()
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/admin_dashboard',$data);
        echo view('layout/footer');
    }
   
}