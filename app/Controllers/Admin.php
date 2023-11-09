<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $kamarModel;
    public function __construct()
    {
        $this->kamarModel = new \App\Models\KamarModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Beranda | SIMKOST',
            'subjudul' => 'Beranda'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar2');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/admin_dashboard');
        echo view('layout/footer');
    }

    public function kamar()
    {
        $kamar=$this->kamarModel->findAll();
        $data = [
            'judul' => 'Kamar Kost | SIMKOST',
            'subjudul' => 'Kamar Kost',
            'kamar' => $kamar
        ];


        echo view('layout/header',$data);
        echo view('layout/sidebar2');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/kamar_kost');
        echo view('layout/footer');
    }

    public function penghuni()
    {
        $data = [
            'judul' => 'Penghuni Kost | SIMKOST',
            'subjudul' => 'Penghuni Kost'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar2');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/penghuni_kost');
        echo view('layout/footer');
    }

    public function laporan()
    {
        $data = [
            'judul' => 'Laporan Tagihan | SIMKOST',
            'subjudul' => 'Laporan Tagihan'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar2');
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
        echo view('layout/sidebar2');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/komplain_admin');
        echo view('layout/footer');
    }
    
    public function akun()
    {
        $data = [
            'judul' => 'Akun Penghuni | SIMKOST',
            'subjudul' => 'Akun Penghuni'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar2');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/tambah_akun');
        echo view('layout/footer');
    }
}