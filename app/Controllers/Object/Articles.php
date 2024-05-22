<?php

namespace App\Controllers\Object;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Articles extends BaseController
{
    public function create(string $type): RedirectResponse
    {
        $articles = model("STPArticles");

        $slug = url_title($this->request->getPost("title_EN"));
        $finalSlug = $slug;
        $counter = 1;
        while ($articles->find($finalSlug)) {
            $finalSlug = $slug . "-" . $counter++;
        }

        // upload image
        $imgUrl = PLACEHOLDER_IMG;
        if ($_FILES["coverImage"]["name"]) {
            $path = $this->request->getFile("coverImage");
            $path->move(UPLOAD_FOLDER_URL, null, true);
            $imgUrl = base_url("/uploads/" . $path->getName());
        }

        // upload attachment if exists
        $attachmentUrl = null;
        if (array_key_exists("attachment", $_FILES) && $_FILES["attachment"]["name"]) {
            $path = $this->request->getFile("attachment");
            $path->move(UPLOAD_FOLDER_URL, null, true);
            $attachmentUrl = base_url("/uploads/" . $path->getName());
        }

        $articles->insert(
            [
                "slug" => $finalSlug,
                "type" => strtoupper($type),
                "imgUrl" => $imgUrl,
                "attachmentUrl" => $attachmentUrl,
                "title_EN" => $this->request->getPost("title_EN"),
                "title_ID" => $this->request->getPost("title_ID"),
                "title_CN" => $this->request->getPost("title_CN"),
                "tag_EN" => $this->request->getPost("tag_EN"),
                "tag_ID" => $this->request->getPost("tag_ID"),
                "tag_CN" => $this->request->getPost("tag_CN"),
                "short_description_EN" => $this->request->getPost("short_description_EN"),
                "short_description_ID" => $this->request->getPost("short_description_ID"),
                "short_description_CN" => $this->request->getPost("short_description_CN"),
                "content_EN" => $this->request->getPost("content_EN"),
                "content_ID" => $this->request->getPost("content_ID"),
                "content_CN" => $this->request->getPost("content_CN"),
                "meta_title_EN" => $this->request->getPost("meta_title_EN"),
                "meta_title_ID" => $this->request->getPost("meta_title_ID"),
                "meta_title_CN" => $this->request->getPost("meta_title_CN"),
                "meta_description_EN" => $this->request->getPost("meta_description_EN"),
                "meta_description_ID" => $this->request->getPost("meta_description_ID"),
                "meta_description_CN" => $this->request->getPost("meta_description_CN"),
                "keywords_EN" => $this->request->getPost("keywords_EN"),
                "keywords_ID" => $this->request->getPost("keywords_ID"),
                "keywords_CN" => $this->request->getPost("keywords_CN"),
            ]
        );

        switch (strtoupper($type)) {
            case "NEWS":
                sendCalmSuccessMessage("News Published!");
                return redirect()->to(route_to("dashboard.media.news"));
            case "PRESS-RELEASE":
                sendCalmSuccessMessage("Press Release Published!");
                return redirect()->to(route_to("dashboard.media.press"));
            case "PRODUCTS":
                sendCalmSuccessMessage("Product Published!");
                return redirect()->to(route_to("dashboard.what-we-do.products"));
            case "ANNUAL-REPORT":
                sendCalmSuccessMessage("Annual Report Created!");
                return redirect()->to(route_to("dashboard.landing.ar"));
        }
        return redirect()->back();
    }

    public function update($slug): RedirectResponse
    {
        $articles = model("STPArticles");
        $instance = $articles->find($slug);

        $data = [
            "slug" => $slug,
            "title_EN" => $this->request->getPost("title_EN"),
            "title_ID" => $this->request->getPost("title_ID"),
            "title_CN" => $this->request->getPost("title_CN"),
            "tag_EN" => $this->request->getPost("tag_EN"),
            "tag_ID" => $this->request->getPost("tag_ID"),
            "tag_CN" => $this->request->getPost("tag_CN"),
            "short_description_EN" => $this->request->getPost("short_description_EN"),
            "short_description_ID" => $this->request->getPost("short_description_ID"),
            "short_description_CN" => $this->request->getPost("short_description_CN"),
            "content_EN" => $this->request->getPost("content_EN"),
            "content_ID" => $this->request->getPost("content_ID"),
            "content_CN" => $this->request->getPost("content_CN"),
            "meta_title_EN" => $this->request->getPost("meta_title_EN"),
            "meta_title_ID" => $this->request->getPost("meta_title_ID"),
            "meta_title_CN" => $this->request->getPost("meta_title_CN"),
            "meta_description_EN" => $this->request->getPost("meta_description_EN"),
            "meta_description_ID" => $this->request->getPost("meta_description_ID"),
            "meta_description_CN" => $this->request->getPost("meta_description_CN"),
            "keywords_EN" => $this->request->getPost("keywords_EN"),
            "keywords_ID" => $this->request->getPost("keywords_ID"),
            "keywords_CN" => $this->request->getPost("keywords_CN"),
        ];

        // upload image
        if ($_FILES["coverImage"]["name"]) {
            $path = $this->request->getFile("coverImage");
            $path->move(UPLOAD_FOLDER_URL, null, true);
            $data['imgUrl'] = base_url("/uploads/" . $path->getName());
        }

        // upload attachment if exists
        if (array_key_exists("attachment", $_FILES) && $_FILES["attachment"]["name"]) {
            $path = $this->request->getFile("attachment");
            $path->move(UPLOAD_FOLDER_URL, null, true);
            $data['attachmentUrl'] = base_url("/uploads/" . $path->getName());
        }

        $articles->save($data);

        switch (strtoupper($instance->type)) {
            case "NEWS":
                sendCalmSuccessMessage("News Updated!");
                return redirect()->to(route_to("dashboard.media.news"));
            case "PRESS-RELEASE":
                sendCalmSuccessMessage("Press Release Updated!");
                return redirect()->to(route_to("dashboard.media.press"));
            case "PRODUCTS":
                sendCalmSuccessMessage("Product Updated!");
                return redirect()->to(route_to("dashboard.what-we-do.products"));
            case "ANNUAL-REPORT":
                sendCalmSuccessMessage("Annual Report Updated!");
                return redirect()->to(route_to("dashboard.landing.ar"));
        }
        return redirect()->back();
    }


    public function delete($slug): RedirectResponse
    {
        $articles = model("STPArticles");

        $articles->delete($slug);

        sendCalmSuccessMessage("Article has been deleted!");
        return redirect()->to(previous_url());
    }

    public function get(string $type): ResponseInterface
    {
        $articles = model("STPArticles");
        $articles_all = $articles
            ->where("type", $type)
            ->orderBy("updated_at DESC")
            ->findAll();

        $excluded_field = ['content_ID', 'content_EN', 'content_CN'];
        foreach ($articles_all as &$article) {
            foreach ($excluded_field as $exf) {
                unset($article->$exf);
            }
        }
        return $this->response->setJSON($articles_all);
    }

    public function detail(string $slug): ResponseInterface
    {
        $articles = model("STPArticles");

        $article = $articles->find($slug);
        $publishDate = date("Y-m-d", strtotime($article->updated_at ?? $article->created_at));
        $type = $article->type;

        $relatedAfter = $articles
            ->where("type", $type)
            ->where("slug != '$slug'", null, false)
            ->groupStart()
            ->where("updated_at >= '$publishDate'", null, false)
            ->orWhere("created_at >= '$publishDate'", null, false)
            ->groupEnd()
            ->orderBy("updated_at", "ASC")
            ->orderBy("created_at", "ASC")
            ->limit(1)
            ->findAll();

        if (count($relatedAfter) == 1) {
            $instance = reset($relatedAfter);
            $slugAfter = $instance->slug;

            $relatedBefore = $articles
                ->where("type", $type)
                ->where("slug != '$slug'", null, false)
                ->where("slug != '$slugAfter'", null, false)
                ->groupStart()
                ->where("updated_at <= '$publishDate'", null, false)
                ->orWhere("created_at <= '$publishDate'", null, false)
                ->groupEnd()
                ->orderBy("updated_at", "DESC")
                ->orderBy("created_at", "DESC")
                ->limit(2)
                ->findAll();

            $related = [$instance];
            foreach ($relatedBefore as $value) {
                $related[] = $value;
            }

        } else {
            $related = $articles
                ->where("type", $type)
                ->where("slug != '$slug'", null, false)
                ->groupStart()
                ->where("updated_at <= '$publishDate'", null, false)
                ->orWhere("created_at <= '$publishDate'", null, false)
                ->groupEnd()
                ->orderBy("updated_at", "DESC")
                ->orderBy("created_at", "DESC")
                ->limit(3)
                ->findAll();
        }

        $article->related = $related;

        $excluded_field = ['content_ID', 'content_EN', 'content_CN'];
        foreach ($article->related as &$related) {
            foreach ($excluded_field as $exf) {
                unset($related->$exf);
            }
        }

        return $this->response->setJSON($article);
    }
}