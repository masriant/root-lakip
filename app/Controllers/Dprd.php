<?php

namespace App\Controllers;

use App\Models\DprdModel;

class Dprd extends BaseController
{
    protected $dprdModel;

    public function __construct()
    {
        $this->dprdModel = new DprdModel();
    }
    // ---------------------------------------------------------------------------------------
    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        // d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $dprd = $this->dprdModel->search($keyword);
        } else {
            $dprd = $this->dprdModel;
        };
        //$dprd = $this->dprdModel->where(['id'=>])->first();



        $data   = [
            'title'         => 'Daftar List Peserta Bimtek',
            // 'dprd'      => $this->dprdModel->findAll()
            // 'dprd'      => $this->dprdModel->paginate(6, 'dprd'),
            'dprd'         => $dprd->paginate(10, 'dprd'),
            'pager'         => $this->dprdModel->pager,
            'currentPage'   => $currentPage




            // 'dprd'    => $this->dprdModel->getMateri(),
            // 'dprd'    => $this->dprdModel->getDprd(),
        ];

        return view('dprd/index', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function detail($slug)
    {
        // ---------------------------------------------------------------------------------------
        $data = [
            'title'     => 'Details User',
            'dprd'    => $this->dprdModel->getDprd($slug)
        ];

        // Jika dprd tidak ada di tabel
        if (empty($data['dprd'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Event Anggota ' . $slug . ' tidak ditemukan.');
        }

        return view('dprd/detail', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function create()
    {
        // session();
        $data   = [
            'title'         => 'Form Tambah Data Anggota',
            'validation'    => \Config\Services::validation()
        ];

        return view('dprd/create', $data);
    }

    // ---------------------------------------------------------------------------------------
    public function save()
    {
        // validasi input
        if (!$this->validate([
            'users'     => [
                'rules'     => 'required|is_unique[dprd.users]',
                'errors'    => [
                    'required'  => '{field} harus diisi!',
                    'is_unique' => '{field} sudah terdaftar pada database kami, gunakan yang unik!'
                ]
            ],
            'nama'          => 'required',
            'jabatan'       => 'required',
            'instansi'      => 'required',
            // 'sampul'       => 'mime_in[sampul,image]|max_size[dprd.sampul]'
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
            // return redirect()->to('/dprd/create')->withInput()->with('validation', $validation);

            return redirect()->to('/dprd/create')->withInput();
        }


        // Ambil Gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // Generate users sampul random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder images 
            $fileSampul->move('images', $namaSampul);
        }

        // ambil users file sampul
        // $namaSampul = $fileSampul->getName();


        $slug = url_title($this->request->getVar('users'), '-', true);
        // $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->dprdModel->save([
            'users'         => $this->request->getVar('users'),
            'nama'          => $this->request->getVar('nama'),
            'slug'          => $slug,
            'kelamin'       => $this->request->getVar('kelamin'),
            'jabatan'       => $this->request->getVar('jabatan'),
            'instansi'      => $this->request->getVar('instansi'),
            'kab_kota'      => $this->request->getVar('kab_kota'),
            'propinsi'      => $this->request->getVar('propinsi'),
            'partai'        => $this->request->getVar('partai'),
            'whatsapp'      => $this->request->getVar('whatsapp'),
            'email'         => $this->request->getVar('email'),
            'refferal'      => $this->request->getVar('refferal'),
            'sampul'        => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data *** ' . $this->request->getVar('users') . ' *** berhasil ditambahkan.');

        return redirect()->to('/dprd');
    }

    // ---------------------------------------------------------------------------------------
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $dprd = $this->dprdModel->find($id);

        // cek jika file gambar default.jpg
        if ($dprd['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('images/' . $dprd['sampul']);
        }

        $this->dprdModel->delete($id);
        session()->setFlashdata('pesan', 'Data *** ' . $dprd['users'] . ' *** berhasil dihapus.');
        return redirect()->to('/dprd');
    }
    // ---------------------------------------------------------------------------------------
    public function edit($slug)
    {
        $data   = [
            'title'         => 'Form Ubah Data Bimtek',
            'validation'    => \Config\Services::validation(),
            'dprd'        => $this->dprdModel->getDprd($slug)
        ];

        return view('dprd/edit', $data);

        session()->setFlashdata('pesan', 'Data berhasil diedit.');
        return redirect()->to('/dprd');
    }
    // ---------------------------------------------------------------------------------------
    public function update($id)
    {
        // Cek Judul
        $materiLama = $this->dprdModel->getDprd($this->request->getVar('slug'));
        if ($materiLama['users'] == $this->request->getVar('users')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[dprd.users]';
        }

        // validasi input
        if (!$this->validate([
            'users'     => [
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
            // return redirect()->to('/dprd/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);

            return redirect()->to('/dprd/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate users file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke folder img
            $fileSampul->move('images/', $namaSampul);
            // hapus file lama
            unlink('images/' . $this->request->getVar('sampulLama'));
        }

        // ---------------------------------------------------------------------------------------

        $slug = url_title($this->request->getVar('users'), '-', true);
        $this->dprdModel->save([
            'id'            => $id,
            'users'         => $this->request->getVar('users'),
            'nama'          => $this->request->getVar('nama'),
            'slug'          => $slug,
            'kelamin'       => $this->request->getVar('kelamin'),
            'jabatan'       => $this->request->getVar('jabatan'),
            'instansi'      => $this->request->getVar('instansi'),
            'kab_kota'      => $this->request->getVar('kab_kota'),
            'propinsi'      => $this->request->getVar('propinsi'),
            'partai'        => $this->request->getVar('partai'),
            'whatsapp'      => $this->request->getVar('whatsapp'),
            'email'         => $this->request->getVar('email'),
            'refferal'      => $this->request->getVar('refferal'),
            'sampul'        => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data *** ' . $this->request->getVar('users') . ' *** berhasil diubah.');

        // return redirect()->to('/dprd/' . $dprd['slug']);
        return redirect()->to('/dprd/' . $slug);
    }
    // ---------------------------------------------------------------------------------------
    public function category()
    {
        $data   = [
            'title'     => "Category",
        ];
        return view('dprd/category', $data);
    }
    // ---------------------------------------------------------------------------------------
}
