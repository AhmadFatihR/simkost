<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TagihanModel;
use App\Models\PenghuniModel;

class Tagihan extends BaseController
{
    protected $tagihanModel;
    protected $penghuniModel;

    public function __construct()
    {
        $this->tagihanModel = new TagihanModel();
        $this->penghuniModel = new PenghuniModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Laporan Tagihan | SIMKOST',
            'subjudul' => 'Laporan Tagihan',
            'tagihan' => $this->tagihanModel->getPenghuniwithTagihan(),
            'penghuni' => $this->penghuniModel->getAllPenghuni(),
            'status_opsi' => ['Lunas', 'Belum lunas'],
            'bulan_sewa' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/laporan',$data);
        echo view('layout/footer');
    }

    public function save()
    {
        $data = $this->request->getVar();
        // dd($data);
        $data['jumlah_pembayaran'] = (int) str_replace(['Rp ', '.', ','], '', $data['jumlah_pembayaran']);
        $data['status_opsi'] = ['Lunas', 'Belum lunas'];
        $data['bulan_sewa'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $request = $this->tagihanModel->insert([
            'id_tagihan' => '',
            'id_penghuni' => $data['nama_penghuni'],
            'tanggal_pembayaran' => $data['tanggal_pembayaran'],
            'jumlah_pembayaran' => $data['jumlah_pembayaran'],
            'status_pembayaran' => $data['status_pembayaran'],
            'bulan' => $data['bulan']
        ]);

        if ($request){
            return redirect()->to('laporan');
        }else{
            dd($this->tagihanModel->errors());
        }
    }

    public function delete($id_transaksi)
    {
        $request = $this->tagihanModel->delete($id_transaksi);
        if($request){
            return redirect()->to('laporan');
        }
    }

    public function update()
    {
        $data  =  $this->request->getVar();
        // dd($data);
        $id_transaksi = $this->request->getGet('id_transaksi');
        $tagihanModel = new TagihanModel();
        $dataToUpdate = [
            'id_penghuni' => $data['nama_penghuni'],
            'tanggal_pembayaran' => $data['tanggal_pembayaran'],
            'jumlah_pembayaran' => $data['jumlah_pembayaran'],
            'bulan' => $data['bulan'],
            'status_pembayaran' => $data['status_pembayaran'], 
        ];

        $tagihanModel->update($id_transaksi,$dataToUpdate);
        return redirect()->to(base_url('laporan'));
    }


}

?>