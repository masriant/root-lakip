<?php

namespace App\Models;

use CodeIgniter\Model;

class DprdModel extends Model
{
    protected $table = 'dprd';
    protected $useTimestamps = 'true';
    protected $allowedFields = ['users', 'nama', 'slug', 'kelamin', 'jabatan', 'instansi', 'kab_kota', 'propinsi', 'partai', 'whatsapp', 'email', 'refferal', 'sampul'];


    public function search($keyword)
    {
        // $builder = $this->table('dprd');
        // $builder->like('post_type', $keyword);
        // return $builder;

        return $this->table('dprd')->like('nama', $keyword)->orLike('kab_kota', $keyword);
    }


    public function getDprd($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
