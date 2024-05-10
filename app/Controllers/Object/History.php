<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use ReflectionException;

class History extends BaseController
{
    public function delete($section, $id): ResponseInterface
    {
        $docs = model("STPHistory");

        $docs->delete($id);
        return $this->response->setJSON([
            "message" => "OK"
        ]);
    }

    public function update($section, $id): ResponseInterface
    {
        $docs = model("STPHistory");
        $instance = $docs->find($id);
        if (!$instance) {
            return $this->response->setStatusCode(404)->setJSON([
                "message" => "Not Found"
            ]);
        }

        foreach ($this->request->getJSON() as $key => $value) {
            $instance->$key = $value;
        }
        $instance = $instance->save();
        return $this->response->setJSON($instance);
    }

    /**
     * @throws ReflectionException
     */
    public function create($section): ResponseInterface
    {
        $docs = model("STPHistory");

        $data = [];
        foreach ($this->request->getJSON() as $key => $value) {
            $data[$key] = $value;
        }

        $data['type'] = $section;

        $docs->insert($data);
        return $this->response->setJSON($docs->getWhere($data)->getLastRow());
    }

    public function list($section): ResponseInterface
    {
//        $limit = array_key_exists("limit", $_GET) && intval($_GET['limit']) ? intval($_GET['limit']) : 10;
//        $page = array_key_exists("page", $_GET) && intval($_GET['page']) ? intval($_GET['page']) : 1;

        $docs = model("STPHistory");
        return $this->response->setJSON(
            $docs->where("type", $section)
                ->orderBy("createdAt", "DESC")
                ->findAll()
//                ->findAll($limit, ($page - 1) * $limit)
        );
    }
}
