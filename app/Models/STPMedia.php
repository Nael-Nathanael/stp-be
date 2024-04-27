<?php

namespace App\Models;

use CodeIgniter\Model;

class STPMedia extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'key';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['key', 'url'];

    protected $useTimestamps = false;

    function getOrPlaceholderByKey($key): string
    {
        $target = $this->find($key);
        if (!$target) {
            return PLACEHOLDER_IMG;
        }
        return $target->url;
    }
}
