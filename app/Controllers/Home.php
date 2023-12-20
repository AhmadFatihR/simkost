<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Beranda | SIMKOST',
            'subjudul' => 'Beranda'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/dashboard',$data);
        echo view('layout/footer');
    }


    public function Komplain()
    {
        $data = [
            'judul' => 'Komplain | SIMKOST',
            'subjudul' => 'Komplain'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/komplain',$data);
        echo view('layout/footer');  
    }

    public function history()
    {
         $data = [
            'judul' => 'History | SIMKOST',
            'subjudul' => 'History'
        ];
        echo view('layout/header',$data);
        echo view('layout/sidebar_user');
        echo view('layout/topbar');
        echo view('user_menu/history',$data);
        echo view('layout/footer');    
    }
}
