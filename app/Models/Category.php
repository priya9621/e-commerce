<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table            = 'category';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['cat_name','cat_image'];




}
