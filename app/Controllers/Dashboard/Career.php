<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Career extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/career/index", $data);
    }
}
