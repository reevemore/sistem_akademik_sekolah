<?php

namespace App\Controllers; 

use App\Models\KelasModel;

class Kelas extends BaseController 
{
    public function index()
    { 
        $m = new KelasModel(); 
        
        return view('kelas/index', [
            'title' => 'Data Kelas',
            'rows'  => $m->orderBy('nama_kelas')->findAll()
        ]); 
    }

    public function new()
    { 
        return view('kelas/form', [
            'title' => 'Tambah Kelas',
            'row'   => null
        ]); 
    }

    public function create()
    { 
        if (!$this->validate(['nama_kelas' => 'required|max_length[20]|is_unique[kelas.nama_kelas]'])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new KelasModel())->insert([
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'wali_kelas' => $this->request->getPost('wali_kelas')
        ]); 

        return redirect()->to('/kelas')->with('success', 'Data kelas ditambahkan.'); 
    }

    public function edit($id = null)
    { 
        $row = (new KelasModel())->find($id); 

        if (!$row) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('kelas/form', [
            'title' => 'Edit Kelas',
            'row'   => $row
        ]); 
    }

    public function update($id = null)
    { 
        if (!$this->validate(['nama_kelas' => "required|max_length[20]|is_unique[kelas.nama_kelas,id_kelas,$id]"])) {
            return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
        }

        (new KelasModel())->update($id, [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'wali_kelas' => $this->request->getPost('wali_kelas')
        ]); 

        return redirect()->to('/kelas')->with('success', 'Data kelas diperbarui.'); 
    }

    public function delete($id = null)
    { 
        try {
            (new KelasModel())->delete($id); 
            return redirect()->to('/kelas')->with('success', 'Data kelas dihapus.');
        } catch (\Throwable $e) {
            return redirect()->to('/kelas')->with('error', 'Kelas tidak dapat dihapus karena sudah digunakan.');
        } 
    }
}