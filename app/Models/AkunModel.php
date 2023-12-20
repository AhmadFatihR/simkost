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
        'id_penghuni'
    ];

    public function getAllAkun()
    {
        return $this->findAll();
    }

    public function getAkunPenghuni()
    {
        return $this->where('role', 'user')
        ->join('penghuni_kos', 'penghuni_kos.id_penghuni = user.id_penghuni', 'left')
        ->findAll();
    }
}

?>