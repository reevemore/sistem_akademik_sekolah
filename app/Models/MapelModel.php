<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
   protected $table='mapel';
   protected $primaryKey='id_mapel';
   protected $allowedFields=['kode_mapel','nama_mapel','id_guru'];
   public function withGuru(){
       return $this->select('mapel.*,guru.nama_guru')->join('guru','guru.id_guru=mapel.id_guru')->orderBy('nama_mapel')->findAll();
   }
}
