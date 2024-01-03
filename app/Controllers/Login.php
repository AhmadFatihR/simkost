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
            return redirect()->to('/')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari formulir login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Inisialisasi model AkunModel
        $akunModel = new AkunModel();

        // Proses login menggunakan model
        $user = $akunModel->where('username', $username)->first();

        // Periksa apakah pengguna ditemukan dan cocok dengan password yang diberikan
        if ($user && $password == $user['password']) {
            $dataUser = $user; // Mengembalikan data pengguna jika login berhasil
        } else {
            session()->setFlashdata('gagal', 'Username atau password salah');
            return redirect()->back()->withInput();
        }

        // Periksa apakah login berhasil
        if ($dataUser != null) {
            // Login berhasil
            $role = $user['role'];
            session()->set('id_user', $user['id_user']);
            // Lakukan redireksi sesuai peran (role) pengguna
            if ($role === 'admin') {
                session()->set('role', 'admin');
                session()->set('status_login', true);
                session()->set('username', $user['username']);
                session()->set('password', $user['password']);
                return redirect()->to('/admin');
            } else {
                session()->set('role', 'user');
                session()->set('status_login', true);
                session()->set('username', $user['username']);
                session()->set('password', $user['password']);
                return redirect()->to('/home');         
            }
        } else {
            // Login gagal, kembali ke halaman login
            return dd($user);//redirect()->to('/login')->withInput()->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }

}
