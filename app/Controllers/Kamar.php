<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KamarModel;

class Kamar extends BaseController
{
    protected $kamarModel;

    public function __construct()
    {
        $this-> kamarModel = new KamarModel();
    }
    public function index()
    {
        $dataKamar = $this->kamarModel->findAll();
        $data = [
            'judul' => 'Kamar Kost | SIMKOST',
            'subjudul' => 'Kamar Kost',
            'kamar' => $dataKamar
        ];

        echo view('layout/header',$data);
        echo view('layout/sidebar2');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/kamar_kost');
        echo view('layout/footer');
    }

    public function save()
    {
        $data = $this->request->getVar();
        // dd($data);

        $request = $this->kamarModel->save([
        'id_kamar' => '',
        'nomor_kamar' => $data['nomor_kamar'],
        'harga' => $data['harga'],
        'fasilitas' => $data['fasilitas'],
        'ukuran' => $data['ukuran_kamar'],
        'status' => 'belum terisi'
        ]);

        if ($request){
            echo 'Berhasil';
        }
    }
}
