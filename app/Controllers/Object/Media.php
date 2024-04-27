<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class Media extends BaseController
{
    public function upload(): RedirectResponse
    {
        $key = $this->request->getPost("key");

        // upload #key
        $path = $this->request->getFile($key);
        $path->move(UPLOAD_FOLDER_URL);

        $media = model("STPMedia");
        $media->save(
            [
                "key" => $key,
                "url" => base_url("/uploads/" . $path->getName())
            ]
        );

        return redirect()->to(previous_url());
    }

    public function dumpUpload(): ResponseInterface
    {
        $path = $this->request->getFile("upload");
        $path->move(UPLOAD_FOLDER_URL);

        return $this->response->setJSON(
            [
                "url" => base_url("/uploads/" . $path->getName())
            ]
        );
    }

    public function get(): ResponseInterface
    {
        $media = model("STPMedia");

        /**
         * @type string[] $post
         */
        $post = $this->request->getJSON();

        /**
         * @type string[] $result
         */
        $result = [];

        foreach ($post as $key) {
            $result->$key = $media->getOrPlaceholderByKey($key);
        }

        return $this->response->setJSON($post);
    }
}
