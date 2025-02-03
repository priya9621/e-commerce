<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
            'product_name' =>[
                'type' =>'VARCHAR',
                'constraint' =>10
            ],
            'product_des' =>[
                'type' =>'text',
                'null' =>true
            ],
            'qty' =>[
                'type' =>'INT',
                'null' =>false
            ],
            'MRP' =>[
                'type' => 'DECIMAL',
                'constraint' =>10.2,
                'null' =>false,
                'default' =>0.00
            ],
            'selling_price' =>[
                'type' => 'DECIMAL',
                'constraint' =>10.2,
                'null' =>false,
                'default' =>0.00
            ],
            'image' =>[
                'type' => 'text',
            ],
            'fk_catid' =>[
                'type' =>'INT'
            ],
            'created_at'=>[
                'type' => 'TIMESTAMP',
                
            ],
            'updated_at'=>[
                'type' => 'TIMESTAMP',
                'null' =>true,
            ]
        ]);
        $this->forge->addKey('id',true);
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
