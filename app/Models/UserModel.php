<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'Users';
    protected $primaryKey    = 'OID';
    protected $createdField  = 'CreatedAt';
    protected $updatedField  = 'ModifiedAt';
    protected $allowedFields = ['Code', 'Password', 'Name', 'RoleOID'];

    public function getUsersWithNameRole()
    {
        $builder = $this->db->table($this->table);
        $builder->select('Users.*,  roles.Name as role_name');
        $builder->join('roles', 'roles.oid = Users.RoleOID');
        return $builder->get()->getResultArray();
    }

    public function findByID($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }
        return false;
    }

    public function getNameRoleswithID($id)  //ini buat detail tiket
    {
        $builder = $this->db->table($this->table);
        $builder->select('Users.*, roles.Name as role_name');
        $builder->join('roles', 'roles.oid = Users.OID');
        $builder->where('Users.OID', $id);
        return $builder->get()->getRow();
    }

    public function getAllRoles1()
    {
        return $this->db->table('roles')->get()->getResult();
    }
}
