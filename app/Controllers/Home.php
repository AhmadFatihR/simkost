<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $komplainModel;
    protected $tagihanModel;
    protected $akunModel;

    public function __construct()
    {
        $this->komplainModel = new \App\Models\KomplainModel();
        $this->tagihanModel = new \App\Models\TagihanModel();
        $this->akunModel = new \App\Models\AkunModel();

    }
    public function index()
    {
        $dataKomplain = $this->komplainModel->where('id_user', session()->get('id_user'))->findAll();
        $jumlahKomplain = count($dataKomplain);
        $dataUser = $this->akunModel->getAkunPenghuni();
        // dd($dataUser);

        $data = [
            'judul' => 'Beranda | SIMKOST',
            'subjudul' => 'Beranda',
            'jumlahKomplain' => $jumlahKomplain,
            'jumlahTagihan' => $this->tagihanModel->getJumlahTagihanUser(session()->get('id_user')),
            'namaUser' => $dataUser[0]['nama_penghuni']
        ];

        // dd($data);
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/dashboard',$data);
        echo view('layout/footer');
    }
}
