<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // -----------------------------------------------------------------------------------------------------------------
        // Simple Queries
        // -----------------------------------------------------------------------------------------------------------------
        // $data = [
        //     'nama'          => 'Masrianto',
        //     'alamat'        => 'Jl. Serdang Baru No.4B Kemayoran - Jakarta',
        //     'created_at'    => Time::now(),
        //     'updated_at'    => Time::now(),
        // ];

        // $this->db->query(
        //     'INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)',
        //     $data
        // );

        // -----------------------------------------------------------------------------------------------------------------
        // Using Query Builder
        // -----------------------------------------------------------------------------------------------------------------
        $data = [
            [
                'nama'          => 'Masrianto',
                'alamat'        => 'Jl. Serdang Baru Raya No.4B Kemayoran - Jakarta',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama'          => 'Hasan Basri',
                'alamat'        => 'Jl. Taruna Jaya No.44 Kemayoran - Jakarta',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ],
            [
                'nama'          => 'Muh Zainal',
                'alamat'        => 'Jl. Cempaka Utara 4 No.25 Kemayoran - Jakarta',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now()
            ]
        ];

        // $this->db->table('orang')->insert($data);
        $this->db->table('orang')->insertBatch($data);
    }
}
