<?php 

namespace app\Models;
use CodeIgniter\Model;

class TagihanModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey ='id_transaksi';
    protected $allowedFields = [
        'id_penghuni',
        'tanggal_pembayaran',
        'jumlah_pembayaran',
        'status_pembayaran'
    ];

    public function getAllTagihan()
    {
        return $this->findAll();
    }

    public function getPenghuniwithTagihan()
    {
        $builder = $this->db->table('transaksi');
        $builder->select('transaksi.*, penghuni_kos.nama_penghuni');
        $builder->join('penghuni_kos','penghuni_kos.id_penghuni=transaksi.id_penghuni');
        $query = $builder->get();

        return $query->getResultArray();
    }
}


?>