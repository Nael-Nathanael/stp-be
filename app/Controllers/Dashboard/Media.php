<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Media extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/media/index", $data);
    }
}
