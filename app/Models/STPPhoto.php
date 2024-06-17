<?php

namespace App\Models;

use CodeIgniter\Model;

class STPPhoto extends Model
{
    protected $table = 'photo';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        "id",
        "album_slug",
        "url",
        "description_EN",
        "description_ID",
        "description_CN",
    ];
    protected $useTimestamps = false;
}
