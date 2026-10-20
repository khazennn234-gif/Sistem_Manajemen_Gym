<?php

namespace App\Controllers;

use App\Models\InstrukturModel;

class Instruktur extends BaseController
{
    protected $instrukturModel;

    public function __construct()
    {
        $this->instrukturModel = new InstrukturModel();
    }

    // Fungsi 1: Menampilkan daftar seluruh instruktur
    public function index()
    {
        $cari = $this->request->getGet('cari');
        if ($cari) {
            $instruktur = $this->instrukturModel->like('nama_instruktur', $cari)
                                               ->orLike('spesialisasi', $cari)
                                               ->orLike('no_hp', $cari)
                                               ->findAll();
        } else {
            $instruktur = $this->instrukturModel->findAll();
        }

        $data = [
            'title'      => 'Data Instruktur Gym',
            'active'     => 'instruktur',
            'instruktur' => $instruktur,
            'cari'       => $cari
        ];

        return view('instruktur/index', $data);
    }

    // Fungsi 2: Form tambah instruktur
    public function tambah()
    {
        $data = [
            'title'  => 'Tambah Instruktur Baru',
            'active' => 'instruktur'
        ];

        return view('instruktur/tambah', $data);
    }

    // Fungsi 3: Simpan data instruktur baru
    public function simpan()
    {
        $this->instrukturModel->insert([
            'nama_instruktur' => $this->request->getPost('nama_instruktur'),
            'spesialisasi'    => $this->request->getPost('spesialisasi'),
            'no_hp'           => $this->request->getPost('no_hp')
        ]);

        return redirect()->to('/instruktur')->with('success', 'Data instruktur gym berhasil ditambahkan!');
    }

    // Fungsi 4: Form edit instruktur
    public function edit($id)
    {
        $instruktur = $this->instrukturModel->find($id);
        if (!$instruktur) {
            return redirect()->to('/instruktur')->with('error', 'Instruktur tidak ditemukan!');
        }

        $data = [
            'title'      => 'Edit Data Instruktur',
            'active'     => 'instruktur',
            'instruktur' => $instruktur
        ];

        return view('instruktur/edit', $data);
    }

    // Fungsi 5: Update data instruktur
    public function update($id)
    {
        $instruktur = $this->instrukturModel->find($id);
        if (!$instruktur) {
            return redirect()->to('/instruktur')->with('error', 'Instruktur tidak ditemukan!');
        }

        $this->instrukturModel->update($id, [
            'nama_instruktur' => $this->request->getPost('nama_instruktur'),
            'spesialisasi'    => $this->request->getPost('spesialisasi'),
            'no_hp'           => $this->request->getPost('no_hp')
        ]);

        return redirect()->to('/instruktur')->with('success', 'Data instruktur gym berhasil diperbarui!');
    }

    // Fungsi 6: Hapus data instruktur
    public function hapus($id)
    {
        $instruktur = $this->instrukturModel->find($id);
        if ($instruktur) {
            $this->instrukturModel->delete($id);
            return redirect()->to('/instruktur')->with('success', 'Data instruktur gym berhasil dihapus!');
        }

        return redirect()->to('/instruktur')->with('error', 'Instruktur tidak ditemukan!');
    }
}
