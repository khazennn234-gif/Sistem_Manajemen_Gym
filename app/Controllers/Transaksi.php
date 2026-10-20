<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\MemberModel;
use App\Models\PaketModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $memberModel;
    protected $paketModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->memberModel    = new MemberModel();
        $this->paketModel     = new PaketModel();
    }

    // Fungsi 1: Menampilkan seluruh riwayat transaksi
    public function index()
    {
        $data = [
            'title'     => 'Data Transaksi Gym',
            'active'    => 'transaksi',
            'transaksi' => $this->transaksiModel->getTransaksiLengkap()
        ];

        return view('transaksi/index', $data);
    }

    // Fungsi 2: Form tambah transaksi baru
    public function tambah()
    {
        $data = [
            'title'   => 'Tambah Transaksi Membership',
            'active'  => 'transaksi',
            'members' => $this->memberModel->findAll(),
            'pakets'  => $this->paketModel->findAll()
        ];

        return view('transaksi/tambah', $data);
    }

    // Fungsi 3: Simpan data transaksi baru
    public function simpan()
    {
        $id_member         = $this->request->getPost('id_member');
        $id_paket          = $this->request->getPost('id_paket');
        $tanggal_transaksi = $this->request->getPost('tanggal_transaksi');
        $total_bayar       = (int)$this->request->getPost('total_bayar');

        // Jika total_bayar kosong, ambil dari harga paket
        if (!$total_bayar && $id_paket) {
            $paket = $this->paketModel->find($id_paket);
            $total_bayar = $paket['harga'] ?? 0;
        }

        $this->transaksiModel->insert([
            'id_member'         => $id_member,
            'id_paket'          => $id_paket,
            'tanggal_transaksi' => $tanggal_transaksi,
            'total_bayar'       => $total_bayar
        ]);

        // Opsional: Perbarui paket aktif di data member
        if ($id_member && $id_paket) {
            $paket = $this->paketModel->find($id_paket);
            if ($paket) {
                $this->memberModel->update($id_member, [
                    'paket'  => $paket['nama_paket'],
                    'status' => 'Aktif'
                ]);
            }
        }

        return redirect()->to('/transaksi')->with('success', 'Transaksi pembayaran membership berhasil dicatat!');
    }

    // Fungsi 4: Hapus transaksi
    public function hapus($id)
    {
        $transaksi = $this->transaksiModel->find($id);
        if ($transaksi) {
            $this->transaksiModel->delete($id);
            return redirect()->to('/transaksi')->with('success', 'Data transaksi berhasil dihapus!');
        }

        return redirect()->to('/transaksi')->with('error', 'Transaksi tidak ditemukan!');
    }
}
