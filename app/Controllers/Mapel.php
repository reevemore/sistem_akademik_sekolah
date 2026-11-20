<?php

namespace App\Controllers;

use App\Models\MapelModel;
use App\Models\GuruModel;

class Mapel extends BaseController 
{
    public function index()
    {
        return view('mapel/index', [
            'title' => 'Mata Pelajaran',
            'rows'  => (new MapelModel())->withGuru()
        ]);
    }

    public function new()
    {
        return view('mapel/form', [
            'title' => 'Tambah Mata Pelajaran',
            'row'   => null,
            'guru'  => (new GuruModel())
                        ->orderBy('nama_guru')
                        ->findAll()
        ]);
    }

    private function data()
    {
        return [
            'kode_mapel' => $this->request->getPost('kode_mapel'),
            'nama_mapel' => $this->request->getPost('nama_mapel'),
            'id_guru'    => $this->request->getPost('id_guru')
        ];
    }

    public function create()
    {
        if (!$this->validate([
            'kode_mapel' => 'required|is_unique[mapel.kode_mapel]',
            'nama_mapel' => 'required',
            'id_guru'    => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new MapelModel())->insert($this->data());
        return redirect()->to('/mapel')->with('success', 'Mapel ditambahkan.');
    }

    public function edit($id = null)
    {
        $r = (new MapelModel())->find($id);
        return view('mapel/form', [
            'title' => 'Edit Mata Pelajaran',
            'row'   => $r,
            'guru'  => (new GuruModel())->orderBy('nama_guru')->findAll()
        ]);
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'kode_mapel' => "required|is_unique[mapel.kode_mapel,id_mapel,$id]",
            'nama_mapel' => 'required',
            'id_guru'    => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new MapelModel())->update($id, $this->data());
        return redirect()->to('/mapel')->with('success', 'Mapel diperbarui.');
    }

    public function delete($id = null)
    {
        try {
            (new MapelModel())->delete($id);
            return redirect()->to('/mapel')->with('success', 'Mapel dihapus.');
        } catch (\Throwable $e) {
            return redirect()->to('/mapel')->with('error', 'Mapel sedang digunakan.');
        }
    }
}