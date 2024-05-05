<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class WhatWeDo extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/what-we-do/index", $data);
    }

    public function products(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/what-we-do/products", $data);
    }

    public function locations(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/what-we-do/locations", $data);
    }
}
