<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/about/index", $data);
    }

    public function bnm(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/about/bnm", $data);
    }

    public function cg(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/about/cg", $data);
    }

    public function oc(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/about/oc", $data);
    }
}
