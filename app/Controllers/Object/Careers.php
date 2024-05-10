<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Careers extends BaseController
{
    public function create(): RedirectResponse
    {
        $careers = model("STPCareer");

        $slug = url_title($this->request->getPost("position_name_EN"));
        $finalSlug = $slug;
        $counter = 1;
        while ($careers->find($finalSlug)) {
            $finalSlug = $slug . "-" . $counter++;
        }

        $careers->insert(
            [
                "slug" => $finalSlug,
                "location_ID" => $this->request->getPost("location_ID"),
                "position_name_ID" => $this->request->getPost("position_name_ID"),
                "employment_status_ID" => $this->request->getPost("employment_status_ID"),
                "excerpt_ID" => $this->request->getPost("excerpt_ID"),
                "responsibilities_ID" => $this->request->getPost("content_ID"),
                "requirements_ID" => $this->request->getPost("content_req_ID"),
                "location_EN" => $this->request->getPost("location_EN"),
                "position_name_EN" => $this->request->getPost("position_name_EN"),
                "employment_status_EN" => $this->request->getPost("employment_status_EN"),
                "excerpt_EN" => $this->request->getPost("excerpt_EN"),
                "responsibilities_EN" => $this->request->getPost("content_EN"),
                "requirements_EN" => $this->request->getPost("content_req_EN"),
                "location_CN" => $this->request->getPost("location_CN"),
                "position_name_CN" => $this->request->getPost("position_name_CN"),
                "employment_status_CN" => $this->request->getPost("employment_status_CN"),
                "excerpt_CN" => $this->request->getPost("excerpt_CN"),
                "responsibilities_CN" => $this->request->getPost("content_CN"),
                "requirements_CN" => $this->request->getPost("content_req_CN"),
                "deadline" => $this->request->getPost("deadline"),
                "url" => $this->request->getPost("url"),
            ]
        );

        sendCalmSuccessMessage("Career Published!");
        return redirect()->to(route_to("dashboard.career.index"));
    }

    public function update($slug): RedirectResponse
    {
        $careers = model("STPCareer");

        $data = [
            "slug" => $slug,
            "location_ID" => $this->request->getPost("location_ID"),
            "position_name_ID" => $this->request->getPost("position_name_ID"),
            "employment_status_ID" => $this->request->getPost("employment_status_ID"),
            "excerpt_ID" => $this->request->getPost("excerpt_ID"),
            "responsibilities_ID" => $this->request->getPost("content_ID"),
            "requirements_ID" => $this->request->getPost("content_req_ID"),
            "location_EN" => $this->request->getPost("location_EN"),
            "position_name_EN" => $this->request->getPost("position_name_EN"),
            "employment_status_EN" => $this->request->getPost("employment_status_EN"),
            "excerpt_EN" => $this->request->getPost("excerpt_EN"),
            "responsibilities_EN" => $this->request->getPost("content_EN"),
            "requirements_EN" => $this->request->getPost("content_req_EN"),
            "location_CN" => $this->request->getPost("location_CN"),
            "position_name_CN" => $this->request->getPost("position_name_CN"),
            "employment_status_CN" => $this->request->getPost("employment_status_CN"),
            "excerpt_CN" => $this->request->getPost("excerpt_CN"),
            "responsibilities_CN" => $this->request->getPost("content_CN"),
            "requirements_CN" => $this->request->getPost("content_req_CN"),
            "deadline" => $this->request->getPost("deadline"),
            "url" => $this->request->getPost("url"),
        ];

        $careers->save($data);

        sendCalmSuccessMessage("Career updated!");
        return redirect()->to(route_to("dashboard.career.index"));
    }


    public function delete($slug): RedirectResponse
    {
        $careers = model("STPCareer");

        $careers->delete($slug);

        sendCalmSuccessMessage("Career deleted!");
        return redirect()->to(route_to("dashboard.career.index"));
    }

    public function get(): ResponseInterface
    {
        $careers = model("STPCareer");
        return $this->response->setJSON($careers->orderBy("position_name_EN", "ASC")->findAll());
    }
}