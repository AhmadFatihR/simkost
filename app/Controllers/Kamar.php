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
        session();
        $dataKamar = $this->kamarModel->findAll();
        $data = [
            'judul' => 'Kamar Kost | SIMKOST',
            'subjudul' => 'Kamar Kost',
            'kamar' => $dataKamar,
            'validation' => \Config\Services::validation()
        ];
        
        echo view('layout/header',$data);
        echo view('layout/sidebar2');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/kamar_kost');
        echo view('layout/footer');
    }

    public function save()
    {
        if(!$this->validate([
            'nomor_kamar'=>'required|is_unique[kamar.nomor_kamar]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kamar')->withInput()->with('validation',$validation);
        }


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
            return redirect()->to('kamar');
        }
    }


    public function delete($id_kamar)
    {
        $request = $this->kamarModel->delete($id_kamar);

        if($request){
        return redirect()->to('kamar');
        }
    }

    public function update()
    {
        $id_kamar = $this->request->getGet('id_kamar');
        $kamarmodel = new KamarModel();
        $dataToUpdate = [
            'nomor_kamar' => $this->request->getGet('nomor_kamar'),
            'harga' => $this->request->getGet('harga'),
            'fasilitas' => $this->request->getGet('fasilitas'),
            'ukuran' => $this->request->getGet('ukuran_kamar')
        ];
    
        $kamarmodel->update($id_kamar, $dataToUpdate);
    
        return redirect()->to('kamar');
    }

}
