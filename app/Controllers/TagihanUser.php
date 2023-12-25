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
        $data = [
            'judul' => 'Tagihan | SIMKOST',
            'subjudul' => 'Tagihan',
            'tagihan' => $this->tagihanModel->getPenghuniwithTagihan(),
            'status_opsi' => ['Lunas', 'Belum Lunas']
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/history',$data);
        echo view('layout/footer');
    }
}


?>