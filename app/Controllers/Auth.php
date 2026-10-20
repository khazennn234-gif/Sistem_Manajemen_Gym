<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Jika sudah login, redirect langsung ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/login', [
            'title' => 'Login Admin - Gym Master'
        ]);
    }

    public function register()
    {
        return view('auth/register', [
            'title' => 'Daftar Akun - Gym Master'
        ]);
    }

    // Fungsi untuk menyimpan data pendaftaran
    public function proses_register()
    {
        $userModel = new UserModel();
        $username  = $this->request->getPost('username');
        $password  = (string)$this->request->getPost('password');
        $role      = $this->request->getPost('role') ?? 'Admin';

        // Cek apakah username sudah ada
        $existing = $userModel->where('username', $username)->first();
        if ($existing) {
            return redirect()->to('/auth/register')->with('error', 'Username sudah terdaftar! Gunakan username lain.');
        }

        $userModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => $role
        ]);

        return redirect()->to('/auth/login')->with('success', 'Akun berhasil dibuat! Silakan Login.');
    }

    // Fungsi untuk memverifikasi login
    public function proses_login()
    {
        $session   = session();
        $userModel = new UserModel();
        
        $username  = $this->request->getPost('username');
        $password  = (string)$this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id_user'   => $user['id_user'],
                    'username'  => $user['username'],
                    'role'      => $user['role'],
                    'logged_in' => true
                ]);

                return redirect()->to('/dashboard')->with('success', 'Selamat datang kembali, ' . $user['username'] . '!');
            } else {
                return redirect()->to('/auth/login')->with('error', 'Password yang Anda masukkan salah!');
            }
        } else {
            return redirect()->to('/auth/login')->with('error', 'Username tidak terdaftar di sistem!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Anda telah berhasil logout.');
    }
}