<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table            = 'paket_gym';
    protected $primaryKey       = 'id_paket';
    protected $allowedFields    = ['nama_paket', 'harga', 'durasi_hari'];
}