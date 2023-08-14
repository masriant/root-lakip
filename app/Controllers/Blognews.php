<?php

namespace App\Controllers;

use App\Models\BlognewsModel;

class Blognews extends BaseController
{
    protected $blognewsModel;

    public function __construct()
    {
        $this->blognewsModel = new BlognewsModel();
    }
    // ---------------------------------------------------------------------------------------
    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        // d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $blognews = $this->blognewsModel->search($keyword);
        } else {
            $blognews = $this->blognewsModel;
        };
        //$blognews = $this->blognewsModel->where(['id'=>])->first();



        $data   = [
            'title'         => 'Daftar Bimtek',
            // 'blognews'      => $this->blognewsModel->findAll()
            // 'blognews'      => $this->blognewsModel->paginate(6, 'blognews'),
            'blognews'         => $blognews->paginate(10, 'blognews'),
            'pager'         => $this->blognewsModel->pager,
            'currentPage'   => $currentPage




            // 'blognews'    => $this->blognewsModel->getMateri(),
            // 'blognews'    => $this->blognewsModel->getBlog(),
        ];

        return view('bimtek/index', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function detail($slug)
    {
        // ---------------------------------------------------------------------------------------
        $data = [
            'title'     => 'Details Bimtek',
            'blognews'    => $this->blognewsModel->getBlog($slug)
        ];

        // Jika blognews tidak ada di tabel
        if (empty($data['blognews'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event Bimtek ' . $slug . ' tidak ditemukan.');
        }

        return view('bimtek/detail', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function create()
    {
        // session();
        $data   = [
            'title'         => 'Form Tambah Data Bimtek',
            'validation'    => \Config\Services::validation()
        ];

        return view('bimtek/create', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'post_title'     => [
                'rules'     => 'required|is_unique[blognews.post_title]',
                'errors'    => [
                    'required'  => '{field} harus diisi!',
                    // 'is_unique' => '{field} sudah terdaftar pada database kami, gunakan yang unik!'
                ]
            ],
            // 'penerbit'       => 'required',
            // 'penulis'       => 'required',
            // 'sampul'       => 'mime_in[sampul,image]|max_size[blognews.sampul]'
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
            // return redirect()->to('/bimtek/create')->withInput()->with('validation', $validation);

            return redirect()->to('/bimtek/create')->withInput();
        }

        // $fileSampul = $this->request->getFile('sampul');
        // if ($fileSampul->getError() == 4) {
        //     $namaSampul ='sampul-default.jpg';
        //     } else {
        //         // Generate post_title sampul random
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
            // Generate post_title sampul random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder images 
            $fileSampul->move('images', $namaSampul);
        }

        // ambil post_title file sampul
        // $namaSampul = $fileSampul->getName();


        $slug = url_title($this->request->getVar('post_title'), '-', true);
        $this->blognewsModel->save([
            'slug'      => $slug,
            'post_author'     => $this->request->getVar('post_author'),
            'post_date'  => $this->request->getVar('post_date'),
            'post_content'   => $this->request->getVar('post_content'),
            'post_title'     => $this->request->getVar('post_title'),
            'post_type'   => $this->request->getVar('post_type'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data *** ' . $this->request->getVar('post_title') . ' *** berhasil ditambahkan.');

        return redirect()->to('/bimtek');
    }

    // ---------------------------------------------------------------------------------------
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $blognews = $this->blognewsModel->find($id);

        // cek jika file gambar default.jpg
        if ($blognews['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('images/' . $blognews['sampul']);
        }

        $this->blognewsModel->delete($id);
        session()->setFlashdata('pesan', 'Data *** ' . $blognews['post_title'] . ' *** berhasil dihapus.');
        return redirect()->to('/bimtek');
    }
    // ---------------------------------------------------------------------------------------
    public function edit($slug)
    {
        $data   = [
            'title'         => 'Form Ubah Data Bimtek',
            'validation'    => \Config\Services::validation(),
            'blognews'        => $this->blognewsModel->getBlog($slug)
        ];

        return view('bimtek/edit', $data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/bimtek');
    }
    // ---------------------------------------------------------------------------------------
    public function update($id)
    {
        // Cek Judul
        $materiLama = $this->blognewsModel->getBlog($this->request->getVar('slug'));
        if ($materiLama['post_title'] == $this->request->getVar('post_title')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blognews.post_title]';
        }

        // validasi input
        if (!$this->validate([
            'post_title'     => [
                'rules'     => $rule_judul,
                'errors'    => [
                    'required'  => '{field} harus diisi!',
                    // 'is_unique' => '{field} sudah terdaftar pada database kami, gunakan yang unik!'
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
            // return redirect()->to('/bimtek/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);

            return redirect()->to('/bimtek/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate post_title file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder img
            $fileSampul->move('images/', $namaSampul);
            // hapus file lama
            unlink('images/' . $this->request->getVar('sampulLama'));
        }

        // ---------------------------------------------------------------------------------------

        $slug = url_title($this->request->getVar('post_title'), '-', true);
        $this->blognewsModel->save([
            'id'        => $id,
            'slug'      => $slug,
            'post_author'     => $this->request->getVar('post_author'),
            'post_date'  => $this->request->getVar('post_date'),
            'post_content'   => $this->request->getVar('post_content'),
            'post_title'     => $this->request->getVar('post_title'),
            'post_type'   => $this->request->getVar('post_type'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        // return redirect()->to('/bimtek/' . $blognews['slug']);
        return redirect()->to('/bimtek/' . $slug);
    }
    // ---------------------------------------------------------------------------------------
    public function category()
    {
        $data   = [
            'title'     => "Category",
        ];
        return view('bimtek/category', $data);
    }
    // ---------------------------------------------------------------------------------------
}
