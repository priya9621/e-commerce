<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PracticsController extends BaseController
{
    public function practics()
    {
        return view('jquery-practics');
    }
}
