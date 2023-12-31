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
        $penghuniModel = new PenghuniModel();

        $keyword = $this->request->getVar('keyword');
        if ($keyword){
            $dataPenghuni = $penghuniModel->search($keyword);
            } else {
                $dataPenghuni = $penghuniModel->getPenghuniWithKamar();
        }

        $data['penghuni'] = $dataPenghuni; // Menggunakan metode yang sesuai
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

        if (!$this->validate([
            'kdpenghuni' => 'required|is_unique[penghuni_kos.kdpenghuni]'
        ])) {
            return redirect()->to('/penghuni')->withInput()->with('validation', \Config\Services::validation());
        }

        $userData = [
            'username' => $data['kdpenghuni'],
            'password' => $data['password'],
            'role' =>'user',
        ];

        $akunModel = new \App\Models\AkunModel(); // Tambahkan AkunModel jika belum diakses sebelumnya
        $userId = $akunModel->simpanDataUser($userData);

        if ($userId) {
            $insertData = [
                'kdpenghuni' => $data['kdpenghuni'],
                'nama_penghuni' => $data['nama_penghuni'],
                'id_kamar' => $data['nomor_kamar'],
                'nohp' => $data['nohp'],
                'tgl_masuk' => $data['tgl_masuk'],
                'id_user' => $userId,
            ];

            $saved = $this->penghuniModel->save($insertData);

            if ($saved) {
                return redirect()->to('/penghuni');
            } else {
                return redirect()->to('/penghuni');
            }
        } else {
            return redirect()->to('/penghuni');
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

        $validationRules = [
            'kdpenghuni' => [
                'rules'=>"required|is_unique[penghuni_kos.kdpenghuni,id_penghuni,$id_penghuni]"]
            ];

            if (!$this->validate($validationRules)){
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }

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
