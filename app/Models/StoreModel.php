<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table = 'Store';
    protected $primaryKey = 'OID';
    protected $createdField  = 'CreatedAt';
    protected $updatedField  = 'ModifiedAt';
    protected $allowedFields = [
        'CompanyOID', 'Code', 'Name', 'StoreRegionOID', 'TenderRegionOID', 'StoreDCOID', 'ReturnDay', 'OptimisticLockField', 'GCRecord', 'BusinessDate', 'StoreType',
        'Expired', 'IsActive', 'EInvoice', 'StoreRegionalOID', 'TInvoice', 'StoreTieringOID'
    ];

    public function getStore() //ini buat list tiket
    {
        $builder = $this->db->table($this->table);
        return $builder->get()->getResultArray();
    }

    public function getStoreAll()
    {
        return $this->findAll();
    }

    public function findByID($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }
        return false;
    }

    public function getAllCompany()
    {
        return $this->db->table('Company')->get()->getResult();
    }

    public function getAllStoreRegion()
    {
        return $this->db->table('StoreRegion')->get()->getResult();
    }

    public function getAllTenderegion()
    {
        return $this->db->table('TenderRegion')->get()->getResult();
    }

    public function getAllStoreregional()
    {
        return $this->db->table('StoreRegional')->get()->getResult();
    }

    public function getAllStoretiering()
    {
        return $this->db->table('StoreTiering')->get()->getResult();
    }

    public function getStoreWithNameOID()
    {
        $builder = $this->db->table($this->table);
        $builder->select('Store.*, Company.Name as company_name, StoreRegion.Name as SR_name, TenderRegion.Name as TR_name,  Storee.Name as SDC_name
        , StoreRegional.Name as SRL_name, StoreTiering.Name as ST_name');
        $builder->join('Company', 'Company.oid = Store.CompanyOID', 'left');
        $builder->join('StoreRegion', 'StoreRegion.oid = Store.StoreRegionOID', 'left');
        $builder->join('TenderRegion', 'TenderRegion.oid = Store.TenderRegionOID', 'left');
        $builder->join('Store as Storee', 'Storee.oid = Store.StoreDCOID', 'left');
        $builder->join('StoreRegional', 'StoreRegional.oid = Store.StoreRegionalOID', 'left');
        $builder->join('StoreTiering', 'StoreTiering.oid = Store.StoreTieringOID', 'left');
        $builder->orderBy('Store.OID', 'ASC');
        return $builder->get()->getResultArray();
    }
}
