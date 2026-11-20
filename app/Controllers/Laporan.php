<?php

namespace App\Controllers;

use App\Models\NilaiModel;
use App\Models\KelasModel;

class Laporan extends BaseController
{
    public function index()
    {
        $kelas = $this->request->getGet('kelas');
        $rows  = (new NilaiModel())->rekap($kelas, null);
        $avg   = count($rows) ? round(array_sum(array_column($rows, 'nilai_akhir')) / count($rows), 2) : 0;

        return view('laporan/index', [
            'title'       => 'Laporan Nilai',
            'rows'        => $rows,
            'kelas'       => (new KelasModel())->orderBy('nama_kelas')->findAll(),
            'filterKelas' => $kelas,
            'rata'        => $avg,
        ]);
    }
}