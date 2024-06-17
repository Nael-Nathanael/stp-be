<?php

namespace App\Models;

use CodeIgniter\Model;

class STPAlbum extends Model
{
    protected $table = 'album';
    protected $primaryKey = 'slug';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        "slug",
        "date",
        "title_EN",
        "title_ID",
        "title_CN",
        "description_EN",
        "description_ID",
        "description_CN",
    ];
    protected $useTimestamps = false;
}
