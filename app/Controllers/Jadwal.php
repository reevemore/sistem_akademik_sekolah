<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\KelasModel;
use App\Models\MapelModel;

class Jadwal extends BaseController
{
    public function index()
    {
        return view('jadwal/index', [
            'title' => 'Jadwal Pelajaran',
            'rows'  => (new JadwalModel())->lengkap()
        ]);
    }

    private function opts()
    {
        return [
            'kelas' => (new KelasModel())->orderBy('nama_kelas')->findAll(),
            'mapel' => (new MapelModel())->withGuru()
        ];
    }

    public function new()
    {
        return view('jadwal/form', array_merge(['title' => 'Tambah Jadwal', 'row' => null], $this->opts()));
    }

    private function data()
    {
        return [
            'id_kelas'    => $this->request->getPost('id_kelas'),
            'id_mapel'    => $this->request->getPost('id_mapel'),
            'hari'        => $this->request->getPost('hari'),
            'jam_mulai'   => $this->request->getPost('jam_mulai'),
            'jam_selesai' => $this->request->getPost('jam_selesai')
        ];
    }

    private function ok()
    {
        return $this->validate([
            'id_kelas'    => 'required',
            'id_mapel'    => 'required',
            'hari'        => 'required',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required'
        ]);
    }

    public function create()
    {
        if (!$this->ok()) {
            return redirect()->back()->withInput()->with('error', 'Semua data jadwal wajib diisi.');
        }

        (new JadwalModel())->insert($this->data());
        return redirect()->to('/jadwal')->with('success', 'Jadwal ditambahkan.');
    }

    public function edit($id = null)
    {
        return view('jadwal/form', array_merge(['title' => 'Edit Jadwal', 'row' => (new JadwalModel())->find($id)], $this->opts()));
    }

    public function update($id = null)
    {
        if (!$this->ok()) {
            return redirect()->back()->withInput()->with('error', 'Semua data jadwal wajib diisi.');
        }

        (new JadwalModel())->update($id, $this->data());
        return redirect()->to('/jadwal')->with('success', 'Jadwal diperbarui.');
    }

    public function delete($id = null)
    {
        (new JadwalModel())->delete($id);
        return redirect()->to('/jadwal')->with('success', 'Jadwal dihapus.');
    }
}