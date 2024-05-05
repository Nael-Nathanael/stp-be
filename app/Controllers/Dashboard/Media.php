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

    public function gallery(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/media/gallery", $data);
    }

    public function news(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/media/news", $data);
    }

    public function press(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/media/press", $data);
    }
}
