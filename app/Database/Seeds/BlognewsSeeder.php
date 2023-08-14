<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class BlognewsSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'slug'          => $faker->slug(2),
                'post_author'   => Time::createFromTimestamp($faker->unixTime()),
                'post_date'     => Time::createFromTimestamp($faker->unixTime()),
                'post_content'  => $faker->text(),
                'post_title'    => $faker->sentence(),
                'post_type'     => $faker->word(),
                'sampul'        => 'default.jpg',
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now(),
            ];

            // $this->db->table('blognews')->insert($data);
            $this->db->table('blognews')->insertBatch($data);
        }



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
        // $data = [
        //     [
        //         'nama'          => 'Masrianto',
        //         'alamat'        => 'Jl. Serdang Baru Raya No.4B Kemayoran - Jakarta',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Hasan Basri',
        //         'alamat'        => 'Jl. Taruna Jaya No.44 Kemayoran - Jakarta',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Muh Zainal',
        //         'alamat'        => 'Jl. Cempaka Utara 4 No.25 Kemayoran - Jakarta',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ]
        // ];

        // $this->db->table('orang')->insert($data); // untuk isi satu data
        // $this->db->table('orang')->insertBatch($data); // untuk isi banyak data
    }
}
