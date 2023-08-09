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
            ],
            // 'penerbit'       => 'required',
            // 'penulis'       => 'required',
            // 'sampul'       => 'mime_in[sampul,image]|max_size[materi.sampul]'
            'sampul'     => [
                'rules'     => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors'    => [
                    'max_size'      => 'maksimal ukuran sampul adalah 1MB - Ukuran gambar terlalu besar',
                    'is_image'      => 'Yang dipilih bukan gambar',
                    'mime_in'       => 'masukkan file gambar dengan ekstensi jpg,png atau jpeg.'
                ]
            ]
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/materi/create')->withInput()->with('validation', $validation);

            return redirect()->to('/materi/create')->withInput();
        }

        // Ambil Gambar
        // $fileSampul = $this->request->getFile('sampul');
        // if ($fileSampul->getError() == 4) {
        //     $namaSampul ='sampul-default.jpg';
        //     } else {
        //         // Generate nama sampul random
        //         $namaSampul = $fileSampul->getRandomName();
        //         // Pindahkan File ke folder img
        //         $fileSampul->move('img/', $namaSampul);
        //         };

        // $fileSampul = $this->request->getFile('sampul');
        // $fileName = $fileSampul->getName();
        // $path = './public/'. $fileName;
        // move_uploaded_file($_FILES['sampul']['tmp_name'],$path );
        // echo "File is valid, and was successfully uploaded.\n";
        // print_r( $_FILES["sampul"]["size"]);
        // dd($this->request->getPost());

        // $fileSampul = $this->request->getFile('sampul');
        // $fileName = $fileSampul->getClientName();
        // $fileSampul->storeAs('/', $fileName,'my_files/');

        // $fileSampul = $this->request->getFile('sampul');
        // $newName = $fileSampul->getRandomName();
        // $fileSampul->move('./uploads/',$newName);

        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder image
            $fileSampul->move('images', $namaSampul);
        }




        // ambil nama file sampul
        // $namaSampul = $fileSampul->getName();


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->materiModel->save([
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/materi');
    }

    // ---------------------------------------------------------------------------------------
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $materi = $this->materiModel->find($id);

        // cek jika file gambar default
        if ($materi['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('images/' . $materi['sampul']);
        }

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
            ],
            'sampul'     => [
                'rules'     => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors'    => [
                    'max_size'      => 'maksimal ukuran sampul adalah 1MB - Ukuran gambar terlalu besar',
                    'is_image'      => 'Yang dipilih bukan gambar',
                    'mime_in'       => 'masukkan file gambar dengan ekstensi jpg,png atau jpeg.'
                ]
            ]
        ])) {

            // $validation = \Config\Services::validation();
            // return redirect()->to('/materi/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);

            return redirect()->to('/materi/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder img
            $fileSampul->move('images/', $namaSampul);
            // hapus file lama
            unlink('images/' . $this->request->getVar('sampulLama'));
        }

        // ---------------------------------------------------------------------------------------

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->materiModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $namaSampul
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
