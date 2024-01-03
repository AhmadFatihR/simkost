<?php

namespace app\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = [
        'username',
        'password',
        'role',
    ];

    public function getAllAkun()
    {
        return $this->findAll();
    }

    public function login($username, $password)
{
    // Cari pengguna berdasarkan username
    $user = $this->where('username', $username)->first();

    // Periksa apakah pengguna ditemukan dan cocok dengan password yang diberikan
    if ($user && $password == $user['password']) {
        return $user; // Mengembalikan data pengguna jika login berhasil
    } else {
        session()->setFlashdata('gagal', 'Username atau password salah');
        return redirect()->back()->withInput();
    }

    return null; // Mengembalikan null jika login gagal
}


    public function getUsersByRole($role)
    {
    return $this->where('role', $role)->findAll();
    }

    public function getAkunPenghuni()
    {
    return $this->select('user.*, penghuni_kos.*')
        ->where('role', 'user')
        ->join('penghuni_kos', 'penghuni_kos.id_user = user.id_user', 'left')
        ->findAll();
    }

    public function simpanDataUser($userData)
    {
        // Menyimpan data pengguna ke dalam tabel 'user'
        $this->insert($userData);

        // Mengembalikan ID user yang baru saja dibuat
        return $this->getInsertID();
    }

    public function search($keyword)
    {
        $builder = $this->db->table('user');
        $builder->like('username', $keyword);
        return $builder->get()->getResultArray();
    }
}

?>