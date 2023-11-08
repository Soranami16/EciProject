<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'oid';
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
    public function getAllDataUser()
    {
        $query = "SELECT * FROM dbo.users";
        $result = $this->db->query($query);
        return $result->getResult();
    }
}
