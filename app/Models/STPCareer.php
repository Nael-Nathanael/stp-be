<?php

namespace App\Models;

use CodeIgniter\Model;

class STPCareer extends Model
{
    protected $table = 'career';
    protected $primaryKey = 'slug';
    protected $useAutoIncrement = false;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        "slug",
        "location_ID",
        "position_name_ID",
        "employment_status_ID",
        "excerpt_ID",
        "responsibilities_ID",
        "requirements_ID",
        "location_EN",
        "position_name_EN",
        "employment_status_EN",
        "excerpt_EN",
        "responsibilities_EN",
        "requirements_EN",
        "location_CN",
        "position_name_CN",
        "employment_status_CN",
        "excerpt_CN",
        "responsibilities_CN",
        "requirements_CN",
        "deadline",
        "url",
        "created_at",
        "updated_at",
    ];
    protected $useTimestamps = false;
}
