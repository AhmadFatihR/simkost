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
        'status',
    ];

}