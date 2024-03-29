<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'Roles';
    protected $primaryKey = 'OID';
    protected $allowedFields = ['Name'];

    public function getAllRoles()
    {
        return $this->findAll();
    }
}
