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
            "articles" => $articleModel->where("type", "NEWS")->orderBy("updated_at", "DESC")->orderBy("created_at", "DESC")->findAll()
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/media/news/index", $data);
    }

    public function news_create(): string
    {
        $data = [];
        bindFlashdata($data);
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
        $articleModel = model("STPArticles");
        $data = [
            "articles" => $articleModel->where("type", "PRESS-RELEASE")->orderBy("updated_at", "DESC")->orderBy("created_at", "DESC")->findAll()
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/media/press/index", $data);
    }

    public function press_create(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/media/press/create", $data);
    }

    public function press_update($slug): string
    {
        $articleModel = model("STPArticles");
        $data = [
            "article" => $articleModel->find($slug)
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/media/press/update", $data);
    }
}
