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
        'status_pembayaran',
        'bulan'
    ];

    public function getAllTagihan()
    {
        return $this->findAll();
    }

    public function getPenghuniwithTagihan($id_user = null, $status = null)
    {
        if($id_user == null && $status == null){
            $builder = $this->db->table('transaksi');
            $builder->select('*');
            $builder->join('penghuni_kos','penghuni_kos.id_penghuni=transaksi.id_penghuni');
            $builder->join('kamar','kamar.id_kamar=penghuni_kos.id_kamar');
            $query = $builder->get();
        }elseif($id_user == null && $status != null){
            $builder = $this->db->table('transaksi');
            $builder->select('*');
            $builder->join('penghuni_kos','penghuni_kos.id_penghuni=transaksi.id_penghuni');
            $builder->join('kamar','kamar.id_kamar=penghuni_kos.id_kamar');
            $builder->where('transaksi.status_pembayaran', $status);
            $query = $builder->get();
        } else {
            $builder = $this->db->table('transaksi');
            $builder->select('*');
            $builder->join('penghuni_kos','penghuni_kos.id_penghuni=transaksi.id_penghuni');
            $builder->join('kamar','kamar.id_kamar=penghuni_kos.id_kamar');
            $builder->where('penghuni_kos.id_user', $id_user);
            $builder->where('transaksi.status_pembayaran', $status);
            $query = $builder->get();
        }
      

        return $query->getResultArray();
    }

    public function getJumlahTagihanUser($id_user = null)
    {
        if($id_user == null)
        {
            $builder = $this->db->table('transaksi');
            $builder->selectSum('jumlah_pembayaran'); // Mengambil total nilai dari kolom jumlah_pembayaran
            $builder->join('penghuni_kos', 'penghuni_kos.id_penghuni = transaksi.id_penghuni');
            $builder->where('transaksi.status_pembayaran', 'Belum lunas');
            $query = $builder->get();
            
            $result = $query->getRow(); // Mengambil baris hasil query
            
            $totalTagihan = $result->jumlah_pembayaran; // Total tagihan dari kolom jumlah_pembayaran
            return $totalTagihan;
        } else {
            $builder = $this->db->table('transaksi');
            $builder->selectSum('jumlah_pembayaran'); // Mengambil total nilai dari kolom jumlah_pembayaran
            $builder->join('penghuni_kos', 'penghuni_kos.id_penghuni = transaksi.id_penghuni');
            $builder->where('penghuni_kos.id_user', $id_user);
            $builder->where('transaksi.status_pembayaran', 'Belum lunas');
            $query = $builder->get();
            
            $result = $query->getRow(); // Mengambil baris hasil query
            
            $totalTagihan = $result->jumlah_pembayaran; // Total tagihan dari kolom jumlah_pembayaran
            return $totalTagihan;
        }
      
        // return $this->db->table('transaksi.jumlah_pembayaran')->selectCount();
    }
}


?>