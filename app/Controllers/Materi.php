<?php

namespace App\Controllers;

use App\Models\MateriModel;

class Materi extends BaseController
{
    protected $materiModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
    }
    // ---------------------------------------------------------------------------------------
    public function index()
    {
        $data   = [
            'title'     => 'Daftar Materi',
            'materi'    => $this->materiModel->getMateri()
        ];

        return view('materi/index', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function detail($slug)
    {
        // ---------------------------------------------------------------------------------------
        $data = [
            'title'     => 'Details Materi',
            'materi'    => $this->materiModel->getMateri($slug)
        ];

        // Jika materi tidak ada di tabel
        if (empty($data['materi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event Materi ' . $slug . ' tidak ditemukan.');
        }

        return view('materi/detail', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function create()
    {
        // session();
        $data   = [
            'title'         => 'Form Tambah Data Materi',
            'validation'    => \Config\Services::validation()
        ];

        return view('materi/create', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'judul'     => [
                'rules'     => 'required|is_unique[materi.judul]',
                'errors'    => [
                    'required'  => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar pada database kami, gunakan yang unik!'
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            return redirect()->to('/materi/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->materiModel->save([
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/materi');
    }

    // ---------------------------------------------------------------------------------------
    public function delete($id)
    {
        $this->materiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/materi');
    }
    // ---------------------------------------------------------------------------------------
    public function edit($slug)
    {
        $data   = [
            'title'         => 'Form Ubah Data Materi',
            'validation'    => \Config\Services::validation(),
            'materi'        => $this->materiModel->getMateri($slug)
        ];

        return view('materi/edit', $data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/materi');
    }
    // ---------------------------------------------------------------------------------------
    public function update($id)
    {
        // Cek Judul
        $materiLama = $this->materiModel->getMateri($this->request->getVar('slug'));
        if ($materiLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[materi.judul]';
        }

        // validasi input
        if (!$this->validate([
            'judul'     => [
                'rules'     => $rule_judul,
                'errors'    => [
                    'required'  => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar pada database kami, gunakan yang unik!'
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            return redirect()->to('/materi/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        // ---------------------------------------------------------------------------------------

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->materiModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/materi');
    }
    // ---------------------------------------------------------------------------------------
    public function category()
    {
        $data   = [
            'title'     => "Category",
        ];
        return view('materi/category', $data);
    }
    // ---------------------------------------------------------------------------------------
}
