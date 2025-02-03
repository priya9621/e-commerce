<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table            = 'cart';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['fk_user_id','fk_product_id','qty','cost','created_at','updated_at'];
    // protected $beforeInsert     = ['beforeInsert'];
    // protected $beforeUpdate     = ['beforeUpdate'];
    // protected function beforeInsert(array $data)
    // {
    //     $data = $this->passwordHash($data);
    //     $data['data']['created_at'] = date('Y-m-d H:i:s');
    //     return $data;
    // }

    // protected function beforeUpdate(array $data)
    // {
    //     $data = $this->passwordHash($data);
    //     $data['data']['updated_at'] = date('Y-m-d H:i:s');
    //     return $data;
    // }

    // protected function passwordHash(array $data)
    // {
    //     if(isset($data['data']['password']))
    //     $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    //     return $data;
    // }

}
