<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_login' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'user_pass' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'user_nicename' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_registered' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'user_status' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'display_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
