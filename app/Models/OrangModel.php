<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
    protected $table = 'orang';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['nama', 'alamat'];
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function search($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
    }


    // public function getOrang($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug' => $slug])->first();
    // }
}
