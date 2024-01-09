<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreLocationModel extends Model
{
    protected $table = 'StoreLocation';
    protected $primaryKey = 'OID';
    protected $createdField  = 'CreatedAt';
    protected $updatedField  = 'ModifiedAt';
    protected $allowedFields = ['StoreOID', 'Code', 'Name'];

    public function findByID($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }
        return false;
    }

    public function getAllStoreLocation()
    {
        return $this->findAll();
    }

    public function getAllStores()
    {
        return $this->db->table('store')->get()->getResult();
    }

    public function getStoreLocationWithNameStoreOID()
    {
        $builder = $this->db->table($this->table);
        $builder->select('StoreLocation.*, store.Name as store_name');
        $builder->join('store', 'store.oid = StoreLocation.StoreOID');
        return $builder->get()->getResultArray();
    }
}
