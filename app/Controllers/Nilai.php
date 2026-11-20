<?php

namespace App\Controllers;

use App\Models\NilaiModel;
use App\Models\SiswaModel;
use App\Models\MapelModel;

class Nilai extends BaseController
{
    public function index()
    {
        return view('nilai/index', [
            'title' => 'Input Nilai',
            'rows'  => (new NilaiModel())->rekap(),
        ]);
    }

    public function new()
    {
        return view('nilai/form', [
            'title' => 'Tambah Nilai',
            'row'   => null,
            'siswa' => (new SiswaModel())->withKelas(),
            'mapel' => (new MapelModel())->withGuru(),
        ]);
    }

    private function data()
    {
        $t = (float) $this->request->getPost('tugas');
        $u = (float) $this->request->getPost('uts');
        $a = (float) $this->request->getPost('uas');

        return [
            'id_siswa'    => $this->request->getPost('id_siswa'),
            'id_mapel'    => $this->request->getPost('id_mapel'),
            'tugas'       => $t,
            'uts'         => $u,
            'uas'         => $a,
            'nilai_akhir' => round(($t * .30) + ($u * .30) + ($a * .40), 2),
            'semester'    => $this->request->getPost('semester'),
        ];
    }

    private function valid()
    {
        return $this->validate([
            'id_siswa' => 'required',
            'id_mapel' => 'required',
            'tugas'    => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]',
            'uts'      => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]',
            'uas'      => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]',
            'semester' => 'required|in_list[1,2]',
        ]);
    }

    public function create()
    {
        if (!$this->valid()) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        try {
            (new NilaiModel())->insert($this->data());

            return redirect()->to('/nilai')->with('success', 'Nilai ditambahkan dan nilai akhir dihitung otomatis.');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', 'Nilai siswa/mapel/semester tersebut sudah ada.');
        }
    }

    public function edit($id = null)
    {
        return view('nilai/form', [
            'title' => 'Edit Nilai',
            'row'   => (new NilaiModel())->find($id),
            'siswa' => (new SiswaModel())->withKelas(),
            'mapel' => (new MapelModel())->withGuru(),
        ]);
    }

    public function update($id = null)
    {
        if (!$this->valid()) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new NilaiModel())->update($id, $this->data());

        return redirect()->to('/nilai')->with('success', 'Nilai diperbarui.');
    }

    public function delete($id = null)
    {
        (new NilaiModel())->delete($id);

        return redirect()->to('/nilai')->with('success', 'Nilai dihapus.');
    }
}