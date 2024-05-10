<?php

namespace App\Models;

use CodeIgniter\Model;

class STPArticles extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'slug';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        "slug",
        "type",
        "imgUrl",
        "title_EN",
        "title_ID",
        "title_CN",
        "tag_EN",
        "tag_ID",
        "tag_CN",
        "short_description_EN",
        "short_description_ID",
        "short_description_CN",
        "content_EN",
        "content_ID",
        "content_CN",
        "meta_title_EN",
        "meta_title_ID",
        "meta_title_CN",
        "meta_description_EN",
        "meta_description_ID",
        "meta_description_CN",
        "keywords_EN",
        "keywords_CN",
        "keywords_ID",
        "updated_at",
        "created_at",
    ];

    protected $useTimestamps = false;
}
