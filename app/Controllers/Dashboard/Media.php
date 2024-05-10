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
        $articleModel = model("STPArticles");
        $data = [
            "articles" => $articleModel->where("type", "NEWS")->orderBy("updated_at", "DESC")->findAll()
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/media/news/index", $data);
    }

    public function news_create(): string
    {
        $data = [];
        bindFlashdata($data);
//        return "Ya";
        return view("_pages/dashboard/media/news/create", $data);
    }

    public function news_update($slug): string
    {
        $articleModel = model("STPArticles");
        $data = [
            "article" => $articleModel->find($slug)
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/media/news/update", $data);
    }

    public function press(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/media/press", $data);
    }
}
