<?php

namespace App\Models;

use CodeIgniter\Model;

class STPStrings extends Model
{
    protected $table = 'strings';
    protected $primaryKey = 'key';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['key', 'ID', 'EN', 'CN'];

    // Dates
    protected $useTimestamps = false;

    function getOrCreateByKey($key, $ignoreKey = false)
    {
        $target = $this->find($key);
        if ($target) {
            if ($ignoreKey) {
                unset($target->key);
            }
            return $target;
        }

        $this->save([
            "key" => $key,
        ]);

        return $this->getOrCreateByKey($key);
    }

    function getDictByKeyArray($keyArray): array
    {
        $sqlResult = $this->whereIn("key", $keyArray)->findAll();
        $dict = [];
        foreach ($sqlResult as $item) {
            $dict[$item->key] = $item;
        }

        return $dict;
    }
}
