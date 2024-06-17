<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Inbox extends BaseController
{
    public function delete($id): ResponseInterface
    {
        $model = model("STPInbox");

        $model->delete($id);

        sendCalmSuccessMessage("Deleted!");
        return redirect()->back();
    }

    /**
     * @throws ReflectionException
     */
    public function create(): ResponseInterface
    {
        $model = model("STPInbox");

        /**
         * @type string[] $post
         */
        $data = $_POST;

        $model->insert($data);

        return redirect()->to("https://www.stpcoal.co.id/contact-us/submitted");
    }

    public function get(): ResponseInterface
    {
        $model = model("STPInbox");
        return $this->response->setJSON(
            $model
                ->orderBy("createdAt", "DESC")
                ->findAll()
        );
    }
}
