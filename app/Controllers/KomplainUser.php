<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomplainModel;

class KomplainUser extends BaseController
{
    protected $komplainModel;

    public function __construct()
    {
        $this->komplainModel= new KomplainModel();
    }

    public function index()
    {
        $id_user = session()->get('id_user');
        $data = [
            'judul' => 'Komplain | SIMKOST',
            'subjudul' => 'Komplain',
            'komplain' => $this->komplainModel->getKomplainwithPenghuni($id_user),
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/komplain',$data);
        echo view('layout/footer');  
    }

    public function save(){
        $data = $this->request->getVar();
        //dd($data);

        $save =  $this->komplainModel->insert([
            'id_komplain' => '',
            'id_user' => $data['id_user'],
            'tanggal_komplain' => $data['tanggal_komplain'],
            'komplain_text' => $data['komplain_text'],
        ]);

        return redirect()->to('/komplain_user');
    }
}


?>