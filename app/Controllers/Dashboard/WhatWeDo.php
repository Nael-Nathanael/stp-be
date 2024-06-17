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
        $articleModel = model("STPArticles");
        $data = [
            "articles" => $articleModel->where("type", "PRODUCTS")
                ->orderBy("updated_at", "DESC")
                ->orderBy("created_at", "DESC")->findAll()
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/what-we-do/products/index", $data);
    }

    public function products_create(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/what-we-do/products/create", $data);
    }

    public function products_update($slug): string
    {
        $articleModel = model("STPArticles");
        $data = [
            "article" => $articleModel->find($slug)
        ];
        bindFlashdata($data);
        return view("_pages/dashboard/what-we-do/products/update", $data);
    }

    public function locations(): string
    {
        $data = [];
        bindFlashdata($data);
        $photoModel = model("STPPhoto");

        $data['photos'] = $photoModel
            ->where("album_slug", "--LOC")
            ->findAll();
        return view("_pages/dashboard/what-we-do/locations", $data);
    }
}
