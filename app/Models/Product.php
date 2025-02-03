<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id','product_name','product_des','qty','MRP','selling_price','image','fk_catid','created_at','updated_at'];
   

}
