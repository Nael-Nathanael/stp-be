<?php

namespace App\Models;

use CodeIgniter\Model;

class STPInbox extends Model
{
    protected $table = 'inbox';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        "id",
        "first_name",
        "last_name",
        "email",
        "subject",
        "note",
        "createdAt",
    ];
    protected $useTimestamps = false;
}
