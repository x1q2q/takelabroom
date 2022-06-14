<?php

namespace App\Models;

use CodeIgniter\Model;

class CodeFacilityModel extends Model
{
    protected $table            = 'code_facilities';
    protected $primaryKey       = 'id_codefac';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['code_facility','facility_id'];
    // Dates
    protected $useTimestamps = false;
}
