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

        $articles->insert(
            [
                "slug" => $finalSlug,
                "type" => strtoupper($type),
                "imgUrl" => $imgUrl,
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

        sendCalmSuccessMessage("New Article Published!");
        switch (strtoupper($type)) {
            case "NEWS":
                return redirect()->to(route_to("dashboard.media.news"));
            case "PRESS-RELEASE":
                return redirect()->to(route_to("dashboard.media.press"));
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

        $articles->save($data);

        sendCalmSuccessMessage("Article has been updated!");
        switch (strtoupper($instance->type)) {
            case "NEWS":
                return redirect()->to(route_to("dashboard.media.news"));
            case "PRESS-RELEASE":
                return redirect()->to(route_to("dashboard.media.press"));
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