<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function profile()
    {
        echo "Hello Wordl!";
    }

    public function contact()
    {
        echo $this->nama;
    }

    public function about()
    {
        echo $this->nama;
    }
}
