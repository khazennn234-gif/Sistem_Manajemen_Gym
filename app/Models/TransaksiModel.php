<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_member', 'id_paket', 'tanggal_transaksi', 'total_bayar'];

    /**
     * Mengambil seluruh data transaksi lengkap dengan nama member & nama paket gym
     */
    public function getTransaksiLengkap()
    {
        return $this->select('transaksi.*, member.nama as nama_member, member.no_hp as no_hp_member, paket_gym.nama_paket, paket_gym.durasi_hari')
                    ->join('member', 'member.id_member = transaksi.id_member', 'left')
                    ->join('paket_gym', 'paket_gym.id_paket = transaksi.id_paket', 'left')
                    ->orderBy('transaksi.id_transaksi', 'DESC')
                    ->findAll();
    }
}
