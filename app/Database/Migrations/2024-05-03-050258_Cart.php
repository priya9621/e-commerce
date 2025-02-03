<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
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
            'fk_product_id' =>[
                'type' =>'INT'
            ],

            'fk_user_id' =>[
                'type' =>'INT'
            ],
            
            'qty' =>[
                'type' =>'INT'
            ],
            'cost' =>[
                'type' =>'DECIMAL',
                'constraint' =>'10,2',
                'null' =>false,
                'default' =>0.00
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
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}
