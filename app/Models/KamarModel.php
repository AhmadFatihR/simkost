<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';
    protected $allowedFields = [
        'nomor_kamar',
        'harga',
        'fasilitas',
        'ukuran',
        'alamat',
        'gambar',
        'status',
    ];

    public function getKamarWithPenghuni()
    {
        $builder = $this->db->table('kamar');
        $builder->select('kamar.*, penghuni_kos.nama_penghuni');
        $builder->join('penghuni_kos', 'penghuni_kos.id_kamar = kamar.id_kamar', 'left');
        $query = $builder->get();
    
        $results = $query->getResultArray();
    
        // Pastikan kolom 'nama_penghuni' ada sebelum mengaksesnya
        foreach ($results as &$result) {
            if (!isset($result['nama_penghuni'])) {
                $result['nama_penghuni'] = null; // Atau nilai default yang sesuai
            }
        }
    
        return $results;
    }
    

    public function getAllKamar()
    {
        return $this->findAll();
    }

    public function editKamar($id_kamar, $dataToUpdate)
    {
        return $this->update($id_kamar, $dataToUpdate);
    }

    public function getJumlahKamar()
    {
        return $this->db->table('kamar')->countAll();
    }

    public function search($keyword)
    {
    $builder = $this->table('kamar');
    $builder->like('nomor_kamar', $keyword)
            ->orLike('harga', $keyword)
            ->orLike('fasilitas', $keyword)
            ->orLike('ukuran', $keyword)
            ->orLike('alamat', $keyword)
            ->orLike('status', $keyword);

    return $builder->get()->getResultArray();
    }

    
}