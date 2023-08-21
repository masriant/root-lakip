<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dprd extends Migration
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
            'users' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50',
            ],
            'nama' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'slug' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'kelamin' => [
                'type'          => 'VARCHAR',
                'constraint'    => '20',
            ],
            'jabatan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'instansi' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'kab_kota' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'propinsi' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'partai' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'whatsapp' => [
                'type'          => 'VARCHAR',
                'constraint'    => '30',
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'refferal' => [
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
        $this->forge->createTable('dprd');
    }

    public function down()
    {
        $this->forge->dropTable('dprd');
    }
}
