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
    protected $allowedFields = ['id', 'type', 'tag', 'title', 'description', 'url', 'createdAt'];
    protected $useTimestamps = false;
}
