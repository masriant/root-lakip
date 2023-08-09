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
        // $materi = $this->materiModel->findAll();
        // $materi = $this->materiModel->getMateri();

        $data   = [
            'title'     => 'Daftar Materi',
            // 'materi'    => $materi,
            'materi'    => $this->materiModel->getMateri()
        ];

        //  cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $materi = $db->query("SELECT * FROM materi");
        // dd($materi);
        // foreach ($materi->getResultArray() as $row) {
        //     d($row);
        // }

        // $materiModel = new \App\Models\MateriModel();

        // $materiModel = new MateriModel();
        // $materiModel->findAll();

        // $materiModel = new MateriModel();
        // $materi = $materiModel->findAll();
        // dd($materi);

        // $materiModel = new MateriModel();
        // $materi = $materiModel->findAll();

        // $materi = $this->materiModel->findAll();
        // dd($materi);

        return view('materi/index', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function detail($slug)
    {
        // $data   = [
        //     'title' => "Category",
        // ];
        // return view('materi/category', $data);

        // echo $slug;

        // $materi = $this->materiModel->where(['slug' => $slug])->first();
        // dd($materi);

        // $materi = $this->materiModel->getMateri($slug);
        // dd($materi);

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
            // 'judul' => 'required|is_unique[materi.judul]',

            'judul'     => [
                'rules'     => 'required|is_unique[materi.judul]',
                'errors'    => [
                    'required'  => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar pada database kami, gunakan yang unik!'
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            // dd($validation);
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
    public function category()
    {
        $data   = [
            'title'     => "Category",
        ];
        return view('materi/category', $data);
    }
    // ---------------------------------------------------------------------------------------
}
