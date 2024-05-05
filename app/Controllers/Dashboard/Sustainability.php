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

    public function dynamic($segment): string
    {
        $data = [
            "segment" => strtoupper($segment)
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/sustainability/dynamic", $data);
    }
}
