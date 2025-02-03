<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderItems extends Migration
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
            'item_name' =>[
                'type' =>'VARCHAR',
                'constraint' =>255
            ],
            'items_amount' =>[
                'type' =>'DECIMAL',
                'constraint' =>'10,2',
                'null' =>false,
                'default' =>0.00
            ],
            'items_qty' =>[
                'type' =>'INT',
                'null' =>false
            ],
            'fk_orderid' =>[
                'type' =>'INT',
                'null' =>true
            ],
            'order_date' =>[
                'type' =>'DATETIME',
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

        $this->forge->createTable('order_items');
    }

    public function down()
    {
        $this->forge->dropTable('order_items');
    }
}
