<?php

namespace App\Models;

use CodeIgniter\Model;

class BlognewsModel extends Model
{
    protected $table = 'blognews';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['slug', 'post_author', 'post_date', 'post_content', 'post_title', 'post_type', 'sampul'];
    // protected $allowedFields = ['users', 'nama', 'slug', 'alamat', 'email', 'whatsapp', 'telepon', 'sampul'];
    // protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function search($keyword)
    {
        // $builder = $this->table('blognews');
        // $builder->like('post_type', $keyword);
        // return $builder;

        return $this->table('blognews')->like('post_type', $keyword)->orLike('post_title', $keyword);
    }


    public function getBlog($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
