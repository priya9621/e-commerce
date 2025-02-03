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
                'constraint'     => 250,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'TEXT',
                'constraint' => '100',
            ],
            'image' => [
                'type' => 'TEXT',
                'constraint' => '100',
                'null' => true,
            ],
            'password' => [
                'type' => 'TEXT',
                'constraint' => '250',
            ],
            'mobile' => [
                'type' => 'INT',
            ],
            'created_at'=>[
                'type' => 'DATETIME',
                //'default' =>'current_timestamp()',
            ],
            'updated_at'=>[
                'type' => 'DATETIME',
                'null' =>true,
                //'default' =>'current_timestamp()',
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
