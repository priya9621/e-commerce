<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'  =>[
                'type'           => 'INT',
                'constraint'     => 255,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'first_name' =>[
                'type'=>'VARCHAR',
                'constraint'     => 255,
            ],
            'last_name' =>[
                'type'=>'VARCHAR',
                'constraint'     => 255,
            ],
            'email' =>[
                'type'=>'VARCHAR',
                'constraint'     => 255,
            ],
            'phone' =>[
                'type'=>'INT',
            ],
            'password' =>[
                'type'=>'VARCHAR',
                'constraint'     => 255,
            ],
            'profile_pic' =>[
                'type'=>'text',
            ],
            'created_at'=>[
                'type' => 'TIMESTAMP',
                //'default' =>'current_timestamp()',
            ],
            'updated_at'=>[
                'type' => 'TIMESTAMP',
                'null' =>true,
                //'default' =>'current_timestamp()',
            ]
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('admin');
    }

    public function down()
    {
       $this->forge->dropTable('admin');
    }
}
