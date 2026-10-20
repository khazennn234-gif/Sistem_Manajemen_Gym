<?php

namespace App\Models;

use CodeIgniter\Model;

class InstrukturModel extends Model
{
    protected $table            = 'instruktur';
    protected $primaryKey       = 'id_instruktur';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_instruktur', 'spesialisasi', 'no_hp'];
}
