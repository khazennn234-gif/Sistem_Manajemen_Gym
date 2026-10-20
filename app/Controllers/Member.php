<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\PaketModel;

class Member extends BaseController
{
    protected $memberModel;
    protected $paketModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->paketModel  = new PaketModel();
    }

    // Fungsi 1: Menampilkan halaman tabel data member (+fitur pencarian)
    public function index()
    {
        $cari = $this->request->getGet('cari');
        if ($cari) {
            $member = $this->memberModel->like('nama', $cari)
                                        ->orLike('no_hp', $cari)
                                        ->orLike('paket', $cari)
                                        ->findAll();
        } else {
            $member = $this->memberModel->findAll();
        }

        $data = [
            'title'   => 'Data Member Gym',
            'active'  => 'member',
            'member'  => $member,
            'cari'    => $cari
        ];

        return view('member/index', $data);
    }

    // Fungsi 2: Menampilkan form tambah member dengan daftar paket dari database
    public function tambah()
    {
        $data = [
            'title'  => 'Tambah Member Baru',
            'active' => 'member',
            'paket'  => $this->paketModel->findAll()
        ];

        return view('member/tambah', $data);
    }

    // Fungsi 3: Menyimpan data member baru ke database
    public function simpan()
    {
        $nama          = $this->request->getPost('nama');
        $no_hp         = $this->request->getPost('no_hp');
        $paket         = $this->request->getPost('paket');
        $tanggal_daftar= $this->request->getPost('tanggal_daftar');
        $status        = $this->request->getPost('status') ?? 'Aktif';

        $this->memberModel->insert([
            'nama'           => $nama,
            'no_hp'          => $no_hp,
            'paket'          => $paket,
            'tanggal_daftar' => $tanggal_daftar,
            'status'         => $status
        ]);

        return redirect()->to('/member')->with('success', 'Data member baru berhasil ditambahkan!');
    }

    // Fungsi 4: Menampilkan form edit member
    public function edit($id)
    {
        $member = $this->memberModel->find($id);
        if (!$member) {
            return redirect()->to('/member')->with('error', 'Data member tidak ditemukan!');
        }

        $data = [
            'title'  => 'Edit Data Member',
            'active' => 'member',
            'member' => $member,
            'paket'  => $this->paketModel->findAll()
        ];

        return view('member/edit', $data);
    }

    // Fungsi 5: Mengupdate perubahan data member
    public function update($id)
    {
        $member = $this->memberModel->find($id);
        if (!$member) {
            return redirect()->to('/member')->with('error', 'Data member tidak ditemukan!');
        }

        $this->memberModel->update($id, [
            'nama'           => $this->request->getPost('nama'),
            'no_hp'          => $this->request->getPost('no_hp'),
            'paket'          => $this->request->getPost('paket'),
            'tanggal_daftar' => $this->request->getPost('tanggal_daftar'),
            'status'         => $this->request->getPost('status')
        ]);

        return redirect()->to('/member')->with('success', 'Data member berhasil diperbarui!');
    }

    // Fungsi 6: Menghapus data member berdasarkan ID
    public function hapus($id)
    {
        $member = $this->memberModel->find($id);
        if ($member) {
            $this->memberModel->delete($id);
            return redirect()->to('/member')->with('success', 'Data member berhasil dihapus!');
        }

        return redirect()->to('/member')->with('error', 'Data member tidak ditemukan!');
    }
}