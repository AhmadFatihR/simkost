<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TagihanModel;

class TagihanUser extends BaseController
{
    protected $tagihanModel;

    public function __construct()
    {
        $this->tagihanModel = new TagihanModel();
    }

    public function index()
    {
        // $dataTagihan = $this->tagihanModel->getPenghuniwithTagihan(session()->get('id_user'));
        // dd($dataTagihan);
        $status = $this->request->getVar();
        if($status != null){
            $data = [
                'judul' => 'Tagihan | SIMKOST',
                'subjudul' => 'Tagihan',
                'tagihan' => $this->tagihanModel->getPenghuniwithTagihan(session()->get('id_user'), $status),
                'status_opsi' => ['Lunas', 'Belum Lunas']
            ];
        }else {
            $data = [
                'judul' => 'Tagihan | SIMKOST',
                'subjudul' => 'Tagihan',
                'tagihan' => $this->tagihanModel->getPenghuniwithTagihan(session()->get('id_user'), 'Belum lunas'),
                'status_opsi' => ['Lunas', 'Belum Lunas']
            ];
        }
        
        // dd($data);
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/history',$data);
        echo view('layout/footer');
    }
}


?>