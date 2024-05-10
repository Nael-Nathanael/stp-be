<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class History extends BaseController
{
    public function delete($id): ResponseInterface
    {
        $docs = model("STPHistory");

        $docs->delete($id);

        sendCalmSuccessMessage("Deleted!");
        return redirect()->back();
    }

    /**
     * @throws ReflectionException
     */
    public function create(): ResponseInterface
    {
        $docs = model("STPHistory");

        $data = [
            "year" => $this->request->getPost("year"),
            "imgUrl" => PLACEHOLDER_IMG,
            "title_EN" => $this->request->getPost("title_EN"),
            "title_ID" => $this->request->getPost("title_ID"),
            "title_CN" => $this->request->getPost("title_CN"),
            "tag_EN" => $this->request->getPost("tag_EN"),
            "tag_ID" => $this->request->getPost("tag_ID"),
            "tag_CN" => $this->request->getPost("tag_CN"),
            "description_EN" => $this->request->getPost("description_EN"),
            "description_ID" => $this->request->getPost("description_ID"),
            "description_CN" => $this->request->getPost("description_CN"),
        ];

        // upload image
        if ($_FILES["coverUrl"]["name"]) {
            $path = $this->request->getFile("coverUrl");
            $path->move(UPLOAD_FOLDER_URL, null, true);
            $data['imgUrl'] = base_url("/uploads/" . $path->getName());
        }

        $docs->insert($data);

        sendCalmSuccessMessage("Saved!");
        return redirect()->back();
    }

    public function list(): ResponseInterface
    {
        $docs = model("STPHistory");
        return $this->response->setJSON(
            $docs
                ->orderBy("year", "DESC")
                ->findAll()
        );
    }
}
