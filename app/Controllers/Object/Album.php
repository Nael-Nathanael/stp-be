<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Album extends BaseController
{
    public function add_photo(string $album_slug): RedirectResponse
    {
        $photoModel = model("STPPhoto");

        // upload image
        $path = $this->request->getFile("img");
        $path->move(UPLOAD_FOLDER_URL, null, true);
        $imgUrl = base_url("/uploads/" . $path->getName());

        $photoModel->insert([
            "album_slug" => $album_slug,
            "url" => $imgUrl,
            "description_EN" => $this->request->getPost("description_EN"),
            "description_ID" => $this->request->getPost("description_ID"),
            "description_CN" => $this->request->getPost("description_CN"),
        ]);

        sendCalmSuccessMessage("Photo uploaded successfully!");
        return redirect()->back();
    }

    public function delete_photo(string $photo_id): RedirectResponse
    {
        $photoModel = model("STPPhoto");

        $photoModel->delete($photo_id);

        sendCalmSuccessMessage("Photo deleted successfully!");
        return redirect()->back();
    }


    public function create(): RedirectResponse
    {
        $model = model("STPAlbum");

        $slug = url_title($this->request->getPost("title_EN"));
        $finalSlug = $slug;
        $counter = 1;
        while ($model->find($finalSlug)) {
            $finalSlug = $slug . "-" . $counter++;
        }

        $_POST['slug'] = $finalSlug;
        $model->insert($_POST);

        return redirect()->to(route_to("dashboard.media.gallery"));
    }

    public function delete($slug): RedirectResponse
    {
        $model = model("STPAlbum");

        $model->delete($slug);

        sendCalmSuccessMessage("Album has been deleted!");
        return redirect()->to(previous_url());
    }

    public function get(): ResponseInterface
    {
        $model = model("STPAlbum");
        $albums = $model
            ->orderBy("date ASC")
            ->findAll();

        $photoModel = model("STPPhoto");

        foreach ($albums as $album) {
            $album->photos = $photoModel
                ->where("album_slug", $album->slug)
                ->findAll();
        }

        return $this->response->setJSON($albums);
    }

    public function getLoc(): ResponseInterface
    {
        $photoModel = model("STPPhoto");

        return $this->response->setJSON($photoModel
            ->where("album_slug", "--LOC")
            ->findAll());
    }
}