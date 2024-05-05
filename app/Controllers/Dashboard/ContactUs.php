<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class ContactUs extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/contact-us/index", $data);
    }

    public function post(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/contact-us/post", $data);
    }
}
