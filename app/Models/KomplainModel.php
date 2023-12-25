<?php 

namespace app\Models;
use CodeIgniter\Model;

class KomplainModel extends Model
{
    protected $table = 'komplain';
    protected $primaryKey = 'id_komplain';
    protected $allowedFields = [
        'id_user',
        'tanggal_komplain',
        'komplain_text',
        'status'
    ];

    public function getAllKomplain()
    {
        return $this->findAll();
    }

    public function getKomplainwithPenghuni($id_user = null)
    {
        if($id_user == null){
        $builder = $this->db->table('komplain');
        $builder->select('*');
        $builder->join('user', 'user.id_user = komplain.id_user');
        $builder->join('penghuni_kos', 'penghuni_kos.id_user = user.id_user');
        $builder->join('kamar', 'kamar.id_kamar = penghuni_kos.id_kamar');
        $query = $builder->get();
        } else {
            $builder = $this->db->table('komplain');
            $builder->select('*');
            $builder->join('user', 'user.id_user = komplain.id_user');
            $builder->join('penghuni_kos', 'penghuni_kos.id_user = user.id_user');
            $builder->join('kamar', 'kamar.id_kamar = penghuni_kos.id_kamar');
            $builder->where('komplain.id_user', $id_user);
            $query = $builder->get(); 
        }

        return $query->getResultArray();
    }

    public function getJumlahKomplain()
    {
        return $this->db->table('komplain')->countAll();
    }

    public function getJumlahKomplainUser()
    {
        return $this->db->table('komplain')->selectCount();
    }
}

?>