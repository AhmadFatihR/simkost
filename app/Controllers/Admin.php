<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $kamarModel;
    protected $penghuniModel;
    protected $komplainModel;
    protected $tagihanModel;
    protected $akunModel;
    public function __construct()
    {
        $this->kamarModel = new \App\Models\KamarModel();
        $this->penghuniModel = new \App\Models\PenghuniModel();
        $this->komplainModel = new \App\Models\KomplainModel();
        $this->tagihanModel = new \App\Models\TagihanModel();
        $this->akunModel = new \App\Models\AkunModel();
    }

    public function index()
    {
        $dataTagihan = $this->tagihanModel->getPenghuniwithTagihan('', 'Belum lunas');
        $dataUser = $this->akunModel->find(session()->get());
        // dd($dataUser);
        $data = [
            'judul' => 'Beranda | SIMKOST',
            'subjudul' => 'Beranda',
            'jumlah_kamar' => $this->kamarModel->getJumlahKamar(),
            'jumlah_penghuni' => $this->penghuniModel->getJumlahPenghuni(),
            'jumlah_komplain' => $this->komplainModel->getJumlahKomplain(),
            'jumlah_tagihan' => count($dataTagihan),
            'namaUser' => $dataUser[0]['username'],
        ];

        // dd($data);
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/admin_dashboard',$data);
        echo view('layout/footer');
    }
   
}