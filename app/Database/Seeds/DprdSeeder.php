<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class DprdSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 15; $i++) {
            $data = [
                'users'             => $faker->word(),
                'nama'              => $faker->name(),
                'slug'              => $faker->slug(2),
                'kelamin'           => $faker->word(),
                'jabatan'           => $faker->word(),
                'instansi'          => $faker->word(),
                'kab_kota'          => $faker->word(),
                'propinsi'          => $faker->word(),
                'partai'            => $faker->word(),
                'whatsapp'          => $faker->word(),
                'email'             => $faker->word(),
                'refferal'          => $faker->word(),
                'sampul'            => 'default.jpg',
                'created_at'        => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'        => Time::now(),
            ];

            $this->db->table('dprd')->insertBatch($data);
        }
    }
}
