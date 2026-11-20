<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table      = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $allowedFields = ['id_kelas', 'id_mapel', 'hari', 'jam_mulai', 'jam_selesai'];

public function lengkap()
{
    return $this->select('jadwal.*, kelas.nama_kelas, mapel.nama_mapel, guru.nama_guru')
        ->join('kelas', 'kelas.id_kelas = jadwal.id_kelas')
        ->join('mapel', 'mapel.id_mapel = jadwal.id_mapel')
        ->join('guru', 'guru.id_guru = mapel.id_guru')
        ->orderBy("FIELD(jadwal.hari, 'Senin','Selasa','Rabu','Kamis','Jumat')", '', false)
        ->orderBy('jadwal.jam_mulai', 'ASC')
        ->findAll();
}
}