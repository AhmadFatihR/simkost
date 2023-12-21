<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkunModel;
use Config\Services;

class Login extends BaseController
{
    protected $akunModel;

    public function index()
    {
        $data = [
            'judul' => 'Login',
        ];
        echo view('layout/header', $data);
        echo view('layout/login');
        echo view('layout/footer');
    }

    public function prosesLogin()
    {
        $validation = Services::validation();

        // Aturan validasi untuk form login
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->to('/login')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari formulir login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Inisialisasi model AkunModel
        $akunModel = new AkunModel();

        // Proses login menggunakan model
        $user = $akunModel->login($username, $password);

        // Periksa apakah login berhasil
        if ($user !== null) {
            // Login berhasil
            $role = $user['role'];

            // Lakukan redireksi sesuai peran (role) pengguna
            if ($role === 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/user/dashboard');
            }
        } else {
            // Login gagal, kembali ke halaman login
            return dd($user);//redirect()->to('/login')->withInput()->with('error', 'Username atau password salah');
        }
    }

    // Method lain seperti register, logout, dll. bisa ditambahkan sesuai kebutuhan
}
