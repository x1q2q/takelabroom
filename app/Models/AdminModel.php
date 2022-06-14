<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id_admin';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['username','full_name','password'];
    // Dates
    protected $useTimestamps = false;
}
