<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    { 
        $db = db_connect();
        $counts = [];
        
        foreach (['users', 'kelas', 'guru', 'siswa', 'mapel', 'jadwal', 'nilai'] as $t) {
            try {
                $counts[$t] = $db->table($t)->countAllResults();
            } catch (\Throwable $e) {
                $counts[$t] = 0;
            }
        }
        
        return view('dashboard/index', [
            'title'  => 'Dashboard',
            'counts' => $counts
        ]);
    }
}