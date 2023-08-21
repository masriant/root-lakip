<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'slug'              => $faker->slug(2),
                'category'          => $faker->word(),
                'category_title'    => $faker->sentence(),
                'category_content'  => $faker->text(),
                'sampul'            => 'default.jpg',
                'created_at'        => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'        => Time::now(),
            ];

            $this->db->table('category')->insertBatch($data);
        }
    }
}
