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
        'nohp',
        'id_user'
    ];

    public function getPenghuniWithKamar()
    {
        $builder = $this->db->table('penghuni_kos');
        $builder->select('penghuni_kos.*, kamar.nomor_kamar');
        $builder->join('kamar', 'kamar.id_kamar=penghuni_kos.id_kamar');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getPenghuniWithUser()
    {
        $builder = $this->db->table('penghuni_kos');
        $builder->select('penghuni_kos.*, user.username'); // Menambahkan kolom username dari tabel user
        $builder->join('user', 'user.id_user = penghuni_kos.id_user'); // Join dengan tabel user
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

    public function search($keyword)
    {
        $builder = $this->db->table('penghuni_kos');
        $builder->select('penghuni_kos.*, kamar.nomor_kamar');
        $builder->join('kamar', 'kamar.id_kamar = penghuni_kos.id_kamar');
        $builder->like('nama_penghuni', $keyword)
                ->orLike('kdpenghuni', $keyword)
                ->orLike('penghuni_kos.id_kamar', $keyword)
                ->orLike('nohp', $keyword);
    
        $query = $builder->get();
        return $query->getResultArray();
    }
}
