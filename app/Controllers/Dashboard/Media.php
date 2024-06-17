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
        $model = model("STPAlbum");
        $albums = $model->orderBy("date ASC")->findAll();

        $photoModel = model("STPPhoto");

        foreach ($albums as $album) {
            $album->photos = $photoModel
                ->where("album_slug", $album->slug)
                ->findAll();
        }

        $data['albums'] = $albums;
        return view("_pages/dashboard/media/gallery", $data);
    }

    public function gallery_detail($album_slug): string
    {
        $data = [];
        bindFlashdata($data);
        $model = model("STPAlbum");
        $album = $model->where("slug", $album_slug)->first();

        $photoModel = model("STPPhoto");

        $album->photos = $photoModel
            ->where("album_slug", $album->slug)
            ->findAll();

        $data['album'] = $album;
        return view("_pages/dashboard/media/gallery_detail", $data);
    }

    public function gallery_add(): string
    {
        $data = [];
        bindFlashdata($data);
        return view("_pages/dashboard/media/gallery_add", $data);
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
