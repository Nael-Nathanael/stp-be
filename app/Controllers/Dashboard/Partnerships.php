<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Partnerships extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/partnerships/index", $data);
    }
}
