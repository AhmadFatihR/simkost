<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KamarModel;
use App\Models\PenghuniModel;

class Penghuni extends BaseController
{
    protected $penghuniModel;
    protected $kamarModel;
    public function __construct()
    {
        $this->penghuniModel = new PenghuniModel();
        $this->kamarModel = new KamarModel();
    }

    public function index()
    {
        $data['penghuni'] = $this->penghuniModel->getPenghuniWithKamar(); // Menggunakan metode yang sesuai
        $data['judul'] = 'Penghuni Kost | SIMKOST';
        $data['subjudul'] = 'Penghuni Kost';
        $data['validation'] = \Config\Services::validation();
        $data['dataKamar'] = $this->kamarModel->findAll();
        echo view('layout/header', $data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar', $data);
        echo view('Admin_menu/penghuni_kost', $data);
        echo view('layout/footer');
    }

    public function save()
    {
        $data = $this->request->getVar();
        //dd($data);

        if (!$this->validate([
            'kdpenghuni' => 'required|is_unique[penghuni_kos.kdpenghuni]'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/penghuni')->withInput()->with('validation', $validation);
        }

       
        $request = $this->penghuniModel->save([
            'id_penghuni' => '',
            'kdpenghuni' => $data['kdpenghuni'],
            'nama_penghuni' => $data['nama_penghuni'],
            'id_kamar' => $data['nomor_kamar'],
            'nohp' => $data['nohp'],
            'tgl_masuk'=>$data['tgl_masuk']
        ]);

        if ($request) {
            return redirect()->to('penghuni');
        }
    }

    public function delete($id_penghuni)
    {
        $request = $this->penghuniModel->delete($id_penghuni);
        if ($request) {
            return redirect()->to('penghuni');
        }
    }

    public function update()
    {
        $id_penghuni = $this->request->getGet('id_penghuni');
        $penghuniModel = new PenghuniModel();
        $dataToUpdate = [
            'kdpenghuni' => $this->request->getGet('kdpenghuni'),
            'nama_penghuni' => $this->request->getGet('nama_penghuni'),
            'id_kamar' => $this->request->getGet('nomor_kamar'),
            'nohp' => $this->request->getGet('nohp'),
            'tgl_masuk' => $this->request->getGet('tgl_masuk')
        ];
        
        $penghuniModel->update($id_penghuni, $dataToUpdate);
        return redirect()->to(base_url('penghuni'));
    }
}
