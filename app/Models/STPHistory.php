<?php

namespace App\Models;

use CodeIgniter\Model;

class STPHistory extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'year';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
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
