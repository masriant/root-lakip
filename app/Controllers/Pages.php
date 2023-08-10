<?php

namespace App\Controllers;

class Pages extends BaseController
{
    // -----------------------------------------------------------------------------------------------------
    public function index()
    {
        // -----------------------------------------------------------------------------------------------------
        // $faker = \Faker\Factory::create();
        // dd($faker->name);


        // -----------------------------------------------------------------------------------------------------
        $data = [
            'title' => "Home Page",
            'tes'   => ['satu', 'dua', 'tiga']
        ];

        return view('pages/home', $data);
    }
    // -----------------------------------------------------------------------------------------------------
    public function profile()
    {
        $data = [
            'title' => "Profile"
        ];
        // echo view('layout/header', $data);
        return view('pages/profile', $data);
        // echo view('layout/footer');
    }
    // -----------------------------------------------------------------------------------------------------
    public function category()
    {
        $data   = [
            'title' => "Category",
            'category'    => [
                [
                    'tipe'      => 'DPRD',
                    'alamat'    => 'Malang, Jawa Timur',
                    'telepon'   => '+62 853 1544 8868',
                    'email'     => 'ssolakip@gmail.com'
                ],
                [
                    'tipe'      => 'PEMDA',
                    'alamat'    => 'Kemayoran, Jakarta Pusat',
                    'telepon'   => '+62 21 4288 5718',
                    'email'     => 'lakippusat@gmail.com'
                ],
                [
                    'tipe'      => 'Dispenda',
                    'alamat'    => 'Kemayoran, Jakarta Pusat',
                    'telepon'   => '+62 21 4288 5718',
                    'email'     => 'lakippusat@gmail.com'
                ],
                [
                    'tipe'      => 'OPD',
                    'alamat'    => 'Kemayoran, Jakarta Pusat',
                    'telepon'   => '+62 21 4288 5718',
                    'email'     => 'lakippusat@gmail.com'
                ],
                [
                    'tipe'      => 'Desa',
                    'alamat'    => 'Kemayoran, Jakarta Pusat',
                    'telepon'   => '+62 21 4288 5718',
                    'email'     => 'lakippusat@gmail.com'
                ]
            ],
        ];
        return view('pages/category', $data);
    }
    // ---------------------------------------------------------------------------------------
    public function about()
    {
        $data = [
            'title' => "About"
        ];

        return view('pages/about', $data);
    }
    // -----------------------------------------------------------------------------------------------------
    public function contact()
    {
        $data = [
            'title'     => "Contact Us",
            'alamat'    => [
                [
                    'tipe'      => 'Rumah',
                    'alamat'    => 'Malang, Jawa Timur',
                    'telepon'   => '+62 853 1544 8868',
                    'email'     => 'ssolakip@gmail.com'
                ],
                [
                    'tipe'      => 'Kantor',
                    'alamat'    => 'Kemayoran, Jakarta Pusat',
                    'telepon'   => '+62 21 4288 5718',
                    'email'     => 'lakippusat@gmail.com'
                ]
            ],


        ];

        return view('pages/contact', $data);
    }
    // -----------------------------------------------------------------------------------------------------
}
