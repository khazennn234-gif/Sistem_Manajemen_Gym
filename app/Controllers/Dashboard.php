<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\PaketModel;
use App\Models\InstrukturModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    protected $memberModel;
    protected $paketModel;
    protected $instrukturModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->memberModel     = new MemberModel();
        $this->paketModel      = new PaketModel();
        $this->instrukturModel = new InstrukturModel();
        $this->transaksiModel  = new TransaksiModel();
    }

    public function index()
    {
        $totalMember      = $this->memberModel->countAllResults();
        $memberAktif      = $this->memberModel->where('status', 'Aktif')->countAllResults();
        $totalPaket       = $this->paketModel->countAllResults();
        $totalInstruktur  = $this->instrukturModel->countAllResults();
        $totalTransaksi   = $this->transaksiModel->countAllResults();

        // Hitung total omzet/pendapatan dari transaksi
        $db = \Config\Database::connect();
        $queryRevenue = $db->query("SELECT SUM(total_bayar) as omzet FROM transaksi")->getRow();
        $totalPendapatan  = $queryRevenue->omzet ?? 0;

        // Ambil data terbaru untuk ringkasan dashboard
        $recentMember     = $this->memberModel->orderBy('id_member', 'DESC')->findAll(5);
        $recentTransaksi  = $this->transaksiModel->getTransaksiLengkap();
        if (count($recentTransaksi) > 5) {
            $recentTransaksi = array_slice($recentTransaksi, 0, 5);
        }

        $data = [
            'title'           => 'Dashboard Utama',
            'active'          => 'dashboard',
            'totalMember'     => $totalMember,
            'memberAktif'     => $memberAktif,
            'totalPaket'      => $totalPaket,
            'totalInstruktur' => $totalInstruktur,
            'totalTransaksi'  => $totalTransaksi,
            'totalPendapatan' => $totalPendapatan,
            'recentMember'    => $recentMember,
            'recentTransaksi' => $recentTransaksi,
        ];

        return view('dashboard/index', $data);
    }
}
