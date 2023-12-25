<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomplainModel;

class Komplain extends BaseController
{
    protected $komplainModel;

    public function __construct()
    {
        $this->komplainModel = new KomplainModel();
    }

    public function index()
    {
        $dataKomplain = $this->komplainModel->getKomplainwithPenghuni();
        //dd($dataKomplain);
        $data = [
            'judul' => 'Komplain | SIMKOST',
            'subjudul' => 'Komplain',
            'komplain' => $this->komplainModel->getKomplainwithPenghuni()
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_admin');
        echo view('layout/topbar',$data);
        echo view('Admin_menu/komplain_admin');
        echo view('layout/footer');
    }
}

?>