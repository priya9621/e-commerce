<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'           => 'INT',
                'constraint'     => 255,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cat_name'=>[
                'type' => 'VARCHAR',
                'constraint' =>100
            ],
            'cat_image'=>[
                'type' => 'text',
                'null' =>false
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
        $this->forge->addKey('id',true);
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
