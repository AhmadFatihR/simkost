<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $kamarModel;
    protected $penghuniModel;
    public function __construct()
    {
        $this->kamarModel = new \App\Models\KamarModel();
        $this->penghuniModel = new \App\Models\PenghuniModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Beranda | SIMKOST',
            'subjudul' => 'Beranda',
            'jumlah_kamar' => $this->kamarModel->getJumlahKamar(),
            'jumlah_penghuni' => $this->penghuniModel->getJumlahPenghuni()
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/admin_dashboard',$data);
        echo view('layout/footer');
    }

    public function laporan()
    {
        $data = [
            'judul' => 'Laporan Tagihan | SIMKOST',
            'subjudul' => 'Laporan Tagihan'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/laporan');
        echo view('layout/footer');
    }

    public function komplain()
    {
        $data = [
            'judul' => 'Komplain | SIMKOST',
            'subjudul' => 'Komplain'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/komplain_admin');
        echo view('layout/footer');
    }
    
}