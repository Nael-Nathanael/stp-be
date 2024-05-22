<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class AnnualReports extends BaseController
{
    public function index(): string
    {
        $articleModel = model("STPArticles");
        $data = [
            "articles" => $articleModel->where("type", "ANNUAL-REPORT")->orderBy("updated_at", "DESC")->orderBy("created_at", "DESC")->findAll()
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/home/ar/index", $data);
    }

    public function create(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/home/ar/create", $data);
    }

    public function update($slug): string
    {
        $articleModel = model("STPArticles");
        $data = [
            "article" => $articleModel->find($slug)
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/home/ar/update", $data);
    }
}
