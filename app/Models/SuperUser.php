<?php

namespace App\Models;

use CodeIgniter\Model;

class SuperUser extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'super_user';
    protected $allowedFields    = ['username','password'];
}
