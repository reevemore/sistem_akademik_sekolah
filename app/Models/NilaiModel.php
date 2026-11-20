<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table      = 'nilai';
    protected $primaryKey = 'id_nilai';

    protected $allowedFields = [
        'id_siswa',
        'id_mapel',
        'tugas',
        'uts',
        'uas',
        'nilai_akhir',
        'semester',
    ];

    public function rekap($kelas = null, $mapel = null, $siswa = null)
    {
        $b = $this->select('nilai.*, siswa.nis, siswa.nama_siswa, kelas.nama_kelas, mapel.nama_mapel')
            ->join('siswa', 'siswa.id_siswa = nilai.id_siswa')
            ->join('kelas', 'kelas.id_kelas = siswa.id_kelas')
            ->join('mapel', 'mapel.id_mapel = nilai.id_mapel');

        if ($kelas) {
            $b->where('siswa.id_kelas', $kelas);
        }

        if ($mapel) {
            $b->where('nilai.id_mapel', $mapel);
        }

        if ($siswa) {
            $b->where('nilai.id_siswa', $siswa);
        }

        return $b->orderBy('kelas.nama_kelas')
            ->orderBy('siswa.nama_siswa')
            ->findAll();
    }
}