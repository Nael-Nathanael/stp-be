<?php

namespace App\Models;

use CodeIgniter\Model;

class STPHistory extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id',
        'type',
        'year',
        'imgUrl',
        'tag_EN',
        'tag_ID',
        'tag_CN',
        'title_EN',
        'title_ID',
        'title_CN',
        'description_EN',
        'description_ID',
        'description_CN',
        'createdAt'
    ];
    protected $useTimestamps = false;
}
