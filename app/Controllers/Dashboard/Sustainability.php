<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Sustainability extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/sustainability/index", $data);
    }
}
