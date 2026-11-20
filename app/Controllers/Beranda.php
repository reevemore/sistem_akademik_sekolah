<?php

namespace App\Controllers;

class Beranda extends BaseController 
{
    public function index()
    { 
        return view('beranda/index', [
            'title' => 'Beranda'
        ]); 
    }
}