<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController 
{
    public function index()
    { 
        if (session()->get('logged_in')) {
            return redirect()->to('/beranda');
        }
        
        return view('auth/login'); 
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi.');
        }

        $user = (new UserModel())->where('username', $this->request->getPost('username'))->first();

        if (!$user || !password_verify((string)$this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }

        session()->set([
            'id_user'   => $user['id_user'],
            'nama'      => $user['nama'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        return redirect()->to('/beranda');
    }

    public function logout()
    { 
        session()->destroy(); 
        
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.'); 
    }
}