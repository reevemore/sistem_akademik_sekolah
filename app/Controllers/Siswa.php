<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;

class Siswa extends BaseController 
{
    public function index()
    { 
        $q = null; 
        $k = null; 
        
        return view('siswa/index', [
            'title'       => 'Data Siswa',
            'rows'        => (new SiswaModel())->withKelas($q, $k),
            'kelas'       => (new KelasModel())->orderBy('nama_kelas')->findAll(),
            'q'           => $q,
            'filterKelas' => $k
        ]); 
    }

    public function new()
    {
        return view('siswa/form', [
            'title' => 'Tambah Siswa',
            'row'   => null,
            'kelas' => (new KelasModel())->orderBy('nama_kelas')->findAll()
        ]);
    }

    private function data()
    {
        return [
            'nis'           => $this->request->getPost('nis'),
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_kelas'      => $this->request->getPost('id_kelas'),
            'alamat'        => $this->request->getPost('alamat')
        ];
    }

    public function create()
    {
        if (!$this->validate([
            'nis'           => 'required|is_unique[siswa.nis]',
            'nama_siswa'    => 'required',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'id_kelas'      => 'required|is_natural_no_zero'
        ])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new SiswaModel())->insert($this->data());

        return redirect()->to('/siswa')->with('success', 'Siswa ditambahkan.');
    }

    public function edit($id = null)
    {
        $r = (new SiswaModel())->find($id);

        if (!$r) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('siswa/form', [
            'title' => 'Edit Siswa',
            'row'   => $r,
            'kelas' => (new KelasModel())->orderBy('nama_kelas')->findAll()
        ]);
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'nis'           => "required|is_unique[siswa.nis,id_siswa,$id]",
            'nama_siswa'    => 'required',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'id_kelas'      => 'required|is_natural_no_zero'
        ])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new SiswaModel())->update($id, $this->data());

        return redirect()->to('/siswa')->with('success', 'Siswa diperbarui.');
    }

    public function delete($id = null)
    {
        try {
            (new SiswaModel())->delete($id);
            return redirect()->to('/siswa')->with('success', 'Siswa dihapus.');
        } catch (\Throwable $e) {
            return redirect()->to('/siswa')->with('error', 'Siswa tidak dapat dihapus.');
        }
    }
}