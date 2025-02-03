<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
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
            'order_id' =>[
                'type' =>'VARCHAR',
                'constraint'     => 255,
            ],
            'order_amount' =>[
                'type' =>'DECIMAL',
            ],
            'order_date' =>[
                'type' =>'datetime'
            ],
            'fk_userid' =>[
                'type' =>'INT',
                'null' =>false
            ],
            'order_status' =>[
                'type' =>'ENUM("Accepted","Pending","out_for_delivery","Rejected")',
                'default' =>'Pending',
                'null' =>false
            ],
            
            'order_type' =>[
                'type' =>'ENUM("Online","COD")',
                'default' =>'COD',
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
        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}
