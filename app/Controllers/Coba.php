<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo 'Ini Controller Coba Method Index';
    }

    public function profile(): string
    {
        return view('welcome_message');
    }

    public function contact(): string
    {
        return view('welcome_message');
    }

    public function about($nama = '')
    {
        echo "Halo, nama saya $nama.";
    }

    public function about2($nama = '', $umur = 0)
    {
        echo "Halo, nama saya $nama, saya berumur $umur tahun.";
    }
}
