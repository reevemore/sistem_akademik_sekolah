<?php

namespace App\Controllers; 

use App\Models\GuruModel;

class Guru extends BaseController 
{
    public function index()
    { 
        return view('guru/index', [
            'title' => 'Data Guru',
            'rows'  => (new GuruModel())->orderBy('nama_guru')->findAll()
        ]); 
    }

    public function new()
    { 
        return view('guru/form', [
            'title' => 'Tambah Guru',
            'row'   => null
        ]); 
    }

    private function data()
    {
        return [
            'nip'           => $this->request->getPost('nip'),
            'nama_guru'     => $this->request->getPost('nama_guru'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_hp'         => $this->request->getPost('no_hp')
        ];
    }

    public function create()
    {
        if (!$this->validate([
            'nip'           => 'required|is_unique[guru.nip]',
            'nama_guru'     => 'required',
            'jenis_kelamin' => 'required|in_list[L,P]'
        ])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new GuruModel())->insert($this->data());

        return redirect()->to('/guru')->with('success', 'Data guru ditambahkan.');
    }

    public function edit($id = null)
    {
        $r = (new GuruModel())->find($id);

        if (!$r) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('guru/form', [
            'title' => 'Edit Guru',
            'row'   => $r
        ]);
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'nip'           => "required|is_unique[guru.nip,id_guru,$id]",
            'nama_guru'     => 'required',
            'jenis_kelamin' => 'required|in_list[L,P]'
        ])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new GuruModel())->update($id, $this->data());

        return redirect()->to('/guru')->with('success', 'Data guru diperbarui.');
    }

    public function delete($id = null)
    {
        try {
            (new GuruModel())->delete($id);
            return redirect()->to('/guru')->with('success', 'Data guru dihapus.');
        } catch (\Throwable $e) {
            return redirect()->to('/guru')->with('error', 'Guru tidak dapat dihapus karena digunakan data lain.');
        }
    }
}