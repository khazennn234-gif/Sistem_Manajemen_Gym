<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    // Nama tabel di database db_manajemen_gym
    protected $table            = 'member';
    
    // Primary key dari tabel tersebut
    protected $primaryKey       = 'id_member';
    
    // Kolom-kolom yang diizinkan untuk diisi data (insert/update)
    protected $allowedFields    = ['nama', 'no_hp', 'paket', 'tanggal_daftar', 'status'];
}