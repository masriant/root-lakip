<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'bigint',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'category' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'category_title' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'category_content' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'sampul' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
