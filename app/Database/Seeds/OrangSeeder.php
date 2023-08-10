<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama'          => 'Masrianto',
            'alamat'        => 'Jl. Serdang Baru No.4B Kemayoran - Jakarta',
            'created_at'    => Time::now(),
            'updated_at'    => Time::now(),
        ];

        // -----------------------------------------------------------------------------------------------------------------
        // Simple Queries
        // -----------------------------------------------------------------------------------------------------------------
        $this->db->query(
            'INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)',
            $data
        );

        // -----------------------------------------------------------------------------------------------------------------
        // Using Query Builder
        // -----------------------------------------------------------------------------------------------------------------
        // $this->db->table('users')->insert($data);
    }
}
