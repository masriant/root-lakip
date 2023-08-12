<?php

namespace App\Controllers;

use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;

    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }
    // ---------------------------------------------------------------------------------------
    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        // d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orangModel->search($keyword);
        } else {
            $orang = $this->orangModel;
        };
        //$orang = $this->orangModel->where(['id'=>])->first();



        $data   = [
            'title'         => 'Daftar Orang',
            // 'orang'      => $this->orangModel->findAll()
            // 'orang'      => $this->orangModel->paginate(6, 'orang'),
            'orang'         => $orang->paginate(6, 'orang'),
            'pager'         => $this->orangModel->pager,
            'currentPage'   => $currentPage




            // 'orang'    => $this->orangModel->getMateri(),
            // 'orang'    => $this->orangModel->getOrang(),
        ];

        return view('orang/index', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function detail($slug)
    {
        // ---------------------------------------------------------------------------------------
        $data = [
            'title'     => 'Details Orang',
            'orang'    => $this->orangModel->getOrang($slug)
        ];

        // Jika orang tidak ada di tabel
        if (empty($data['orang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event Orang ' . $slug . ' tidak ditemukan.');
        }

        return view('orang/detail', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function create()
    {
        // session();
        $data   = [
            'title'         => 'Form Tambah Data Orang',
            'validation'    => \Config\Services::validation()
        ];

        return view('orang/create', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama'     => [
                'rules'     => 'required|is_unique[orang.judul]',
                'errors'    => [
                    'required'  => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar pada database kami, gunakan yang unik!'
                ]
            ],
            // 'penerbit'       => 'required',
            // 'penulis'       => 'required',
            // 'sampul'       => 'mime_in[sampul,image]|max_size[orang.sampul]'
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
            // return redirect()->to('/orang/create')->withInput()->with('validation', $validation);

            return redirect()->to('/orang/create')->withInput();
        }

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

        // Ambil Gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder images 
            $fileSampul->move('images', $namaSampul);
        }

        // ambil nama file sampul
        // $namaSampul = $fileSampul->getName();


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->orangModel->save([
            'nama'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'alamat'   => $this->request->getVar('alamat'),
            'whatsapp'  => $this->request->getVar('whatsapp'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/orang');
    }

    // ---------------------------------------------------------------------------------------
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $orang = $this->orangModel->find($id);

        // cek jika file gambar default.jpg
        if ($orang['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('images/' . $orang['sampul']);
        }

        $this->orangModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/orang');
    }
    // ---------------------------------------------------------------------------------------
    public function edit($slug)
    {
        $data   = [
            'title'         => 'Form Ubah Data Orang',
            'validation'    => \Config\Services::validation(),
            'orang'        => $this->orangModel->getOrang($slug)
        ];

        return view('orang/edit', $data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/orang');
    }
    // ---------------------------------------------------------------------------------------
    public function update($id)
    {
        // Cek Judul
        $materiLama = $this->orangModel->getOrang($this->request->getVar('slug'));
        if ($materiLama['nama'] == $this->request->getVar('nama')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[orang.nama]';
        }

        // validasi input
        if (!$this->validate([
            'nama'     => [
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
            // return redirect()->to('/orang/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);

            return redirect()->to('/orang/edit/' . $this->request->getVar('slug'))->withInput();
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

        $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->orangModel->save([
            'id'        => $id,
            'nama'     => $this->request->getVar('nama'),
            'slug'      => $slug,
            'alamat'   => $this->request->getVar('alamat'),
            'whatsapp'  => $this->request->getVar('whatsapp'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/orang');
    }
    // ---------------------------------------------------------------------------------------
    public function category()
    {
        $data   = [
            'title'     => "Category",
        ];
        return view('orang/category', $data);
    }
    // ---------------------------------------------------------------------------------------
}
