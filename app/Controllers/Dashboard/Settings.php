<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Settings extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/settings/index", $data);
    }
}
