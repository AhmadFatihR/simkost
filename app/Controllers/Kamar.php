<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KamarModel;

class Kamar extends BaseController
{
    protected $kamarModel;

    public function __construct()
    {
        $this->kamarModel = new KamarModel();
    }

    public function index()
    {
        $kamarModel = new KamarModel();

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $dataKamar = $kamarModel->search($keyword);
        } else {
            $dataKamar = $kamarModel->getAllKamar();
        }
    
        $data = [
            'judul' => 'Kamar Kost | SIMKOST',
            'subjudul' => 'Kamar Kost',
            'kamar' => $dataKamar,
            'validation' => \Config\Services::validation()
        ];
    
        // Update room status for occupied rooms
        $userModel = new \App\Models\PenghuniModel();
        $dataUser = $userModel->get()->getResult();
        foreach ($dataUser as $row) {
            $modelKamar = new \App\Models\KamarModel();
            $modelKamar->where([
                'status' => 'belum terisi',
                'id_kamar' => $row->id_kamar
            ])->set([
                'status' => 'terisi'
            ])->update();
        }
    
        echo view('layout/header', $data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar', $data);
        echo view('Admin_menu/kamar_kost', $data);
        echo view('layout/footer');
    }
    

    public function save()
    {
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'nomor_kamar' => [
                'rules' => 'required|is_unique[kamar.nomor_kamar]'
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,10024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
            ]
        ])) {
            // Menampilkan error validasi
            return redirect()->to('/kamar')->withInput()->with('validation', $validation);
        }

        $data = $this->request->getVar();

        $data['harga'] = (int) str_replace(['Rp ', '.', ','], '', $data['harga']);

        //ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        // apakah tidak ada gambar yg di upload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        }else{
        // generate nama gambar baru
        $namaGambar = $fileGambar->getRandomName();
        // pindahkan file ke folder img
        $fileGambar->move('img',$namaGambar);
        }


        // Simpan data ke dalam database
        $request = $this->kamarModel->save([
            'id_kamar' => '',
            'nomor_kamar' => $data['nomor_kamar'],
            'harga' => $data['harga'],
            'fasilitas' => $data['fasilitas'],
            'ukuran' => $data['ukuran_kamar'],
            'gambar' => $namaGambar,
            'alamat' => $data['alamat'],
            'status' => 'belum terisi'
        ]);

        // Periksa apakah penyimpanan berhasil
        if ($request) {
            return redirect()->to('kamar');
        } else {
            // Tambahkan pesan kesalahan atau log jika diperlukan
            dd($this->kamarModel->errors());
        }
    }
    
    
    public function delete($id_kamar)
    {
        //cari gambar berdasar id_kamar
        $kamar = $this->kamarModel->find($id_kamar);

        //cek jika file gambarnya default.jpg
        if($kamar['gambar'] != 'default.jpg'){
            //hapus file gambar
            unlink('img/'. $kamar['gambar']);
        }

        $request = $this->kamarModel->delete($id_kamar);

        if ($request) {
            return redirect()->to('kamar');
        }
    }

    public function update()
{
    $fileGambar = $this->request->getFile('gambar');
    if ($fileGambar->getName() == '') {
        echo 'tidak mengupdate gambar';
    }
    else {
        echo 'update gambar';
    };
    $id_kamar = $this->request->getPost('id_kamar');
    $kamarmodel = new KamarModel();

    $validationRules = [
        'nomor_kamar' => [
            'rules' => "required|is_unique[kamar.nomor_kamar,id_kamar,$id_kamar]"
        ],
        'gambar' => [
            'rules' => 'max_size[gambar,10024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]'
        ]
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $dataToUpdate = [
        'nomor_kamar' => $this->request->getPost('nomor_kamar'),
        'harga' => $this->request->getPost('harga'),
        'fasilitas' => $this->request->getPost('fasilitas'),
        'ukuran' => $this->request->getPost('ukuran_kamar'),
        'alamat' => $this->request->getPost('alamat'),
    ];

    // Handle the image update
    $fileGambar = $this->request->getFile('gambar');

    if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
        $existingKamar = $kamarmodel->find($id_kamar);
        if ($existingKamar['gambar'] != 'default.jpg') {
            unlink('img/' . $existingKamar['gambar']);
        }

        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('img', $namaGambar);
        $dataToUpdate['gambar'] = $namaGambar;
    }

    if ($kamarmodel->update($id_kamar, $dataToUpdate)) {
        return redirect()->to('kamar');
    } else {
        return redirect()->back()->with('errors', $kamarmodel->errors());
    }
}

    

}