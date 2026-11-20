<?php

namespace App\Models; 

use CodeIgniter\Model;

class SiswaModel extends Model 
{ 
    protected $table = 'siswa'; 
    protected $primaryKey = 'id_siswa'; 
    protected $allowedFields = ['nis', 'nama_siswa', 'jenis_kelamin', 'id_kelas', 'alamat'];

    public function withKelas($q = null, $kelas = null)
    {
        $b = $this->select('siswa.*, kelas.nama_kelas')
                  ->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
                  
        if ($q) {
            $b->groupStart()
              ->like('siswa.nis', $q)
              ->orLike('siswa.nama_siswa', $q)
              ->groupEnd();
        }
        
        if ($kelas) {
            $b->where('siswa.id_kelas', $kelas);
        }
        
        return $b->orderBy('nama_siswa')->findAll();
    }
}