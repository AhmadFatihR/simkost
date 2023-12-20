<?php 

namespace App\Models;

use CodeIgniter\Model;

class PenghuniModel extends Model
{
    protected $table = 'penghuni_kos';
    protected $primaryKey = 'id_penghuni';
    protected $allowedFields = [
        'kdpenghuni',
        'nama_penghuni',
        'id_kamar',
        'tgl_masuk',
        'nohp'
    ];

    public function getPenghuniWithKamar()
    {
        $builder = $this->db->table('penghuni_kos');
        $builder->select('penghuni_kos.*, kamar.nomor_kamar');
        $builder->join('kamar', 'kamar.id_kamar=penghuni_kos.id_kamar');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getAllPenghuni()
    {
        return $this->findAll();
    }

    public function getJumlahPenghuni()
    {
       return $this->db->table('penghuni_kos')->countAll();
    }
}
