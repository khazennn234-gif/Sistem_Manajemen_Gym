<?php

namespace App\Controllers;

use App\Models\PaketModel;

class Paket extends BaseController
{
    protected $paketModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    // Fungsi 1: Menampilkan seluruh paket gym
    public function index()
    {
        $data = [
            'title'  => 'Daftar Paket Gym',
            'active' => 'paket',
            'paket'  => $this->paketModel->findAll()
        ];

        return view('paket/index', $data);
    }

    // Fungsi 2: Form tambah paket
    public function tambah()
    {
        $data = [
            'title'  => 'Tambah Paket Gym',
            'active' => 'paket'
        ];

        return view('paket/tambah', $data);
    }

    // Fungsi 3: Simpan paket baru
    public function simpan()
    {
        $this->paketModel->insert([
            'nama_paket'  => $this->request->getPost('nama_paket'),
            'harga'       => (int)$this->request->getPost('harga'),
            'durasi_hari' => (int)$this->request->getPost('durasi_hari')
        ]);

        return redirect()->to('/paket')->with('success', 'Paket gym baru berhasil ditambahkan!');
    }

    // Fungsi 4: Form edit paket
    public function edit($id)
    {
        $paket = $this->paketModel->find($id);
        if (!$paket) {
            return redirect()->to('/paket')->with('error', 'Paket tidak ditemukan!');
        }

        $data = [
            'title'  => 'Edit Paket Gym',
            'active' => 'paket',
            'paket'  => $paket
        ];

        return view('paket/edit', $data);
    }

    // Fungsi 5: Update paket
    public function update($id)
    {
        $paket = $this->paketModel->find($id);
        if (!$paket) {
            return redirect()->to('/paket')->with('error', 'Paket tidak ditemukan!');
        }

        $this->paketModel->update($id, [
            'nama_paket'  => $this->request->getPost('nama_paket'),
            'harga'       => (int)$this->request->getPost('harga'),
            'durasi_hari' => (int)$this->request->getPost('durasi_hari')
        ]);

        return redirect()->to('/paket')->with('success', 'Paket gym berhasil diperbarui!');
    }

    // Fungsi 6: Hapus paket
    public function hapus($id)
    {
        $paket = $this->paketModel->find($id);
        if ($paket) {
            $this->paketModel->delete($id);
            return redirect()->to('/paket')->with('success', 'Paket gym berhasil dihapus!');
        }

        return redirect()->to('/paket')->with('error', 'Paket tidak ditemukan!');
    }
}