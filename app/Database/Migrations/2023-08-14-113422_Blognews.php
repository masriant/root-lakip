<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Blognews extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'bigint',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'post_author' => [
                'type' => 'VARCHAR',
                'null' => 255,
            ],
            'post_date' => [
                'type' => 'VARCHAR',
                'null' => 255,
            ],
            'post_content' => [
                'type'       => 'longtext',
            ],
            'post_title' => [
                'type'       => 'text',
            ],
            'post_type' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'sampul' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blognews');
    }

    public function down()
    {
        $this->forge->dropTable('blognews');
    }
}
