<?php

namespace App\Models;

use CodeIgniter\Model;

class STPDocuments extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id',
        'type',
        'tag',
        'tag_ID',
        'tag_CN',
        'title',
        'title_ID',
        'title_CN',
        'description',
        'description_ID',
        'description_CN',
        'url',
        'url_ID',
        'url_CN',
        'createdAt'
    ];
    protected $useTimestamps = false;
}
