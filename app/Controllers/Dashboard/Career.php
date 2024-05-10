<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Career extends BaseController
{
    public function index(): string
    {
        $careers = model("STPCareer");
        $data = [
            "careers" => $careers->orderBy("position_name_EN", "ASC")->findAll()
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/career/index", $data);
    }

    public function create(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/career/create", $data);
    }

    public function update($slug): string
    {
        $careers = model("STPCareer");
        $data = [
            "career" => $careers->find($slug)
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/career/update", $data);
    }
}
