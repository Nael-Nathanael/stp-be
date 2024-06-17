<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Inbox extends BaseController
{
    public function index(): string
    {
        $data = [];
        bindFlashdata($data);

        $model = model("STPInbox");
        $data['messages'] = $model
            ->orderBy("createdAt", "DESC")
            ->findAll();
        return view("_pages/dashboard/inbox/index", $data);
    }
}
