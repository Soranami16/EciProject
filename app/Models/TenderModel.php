<?php

namespace App\Models;

use CodeIgniter\Model;

class TenderModel extends Model
{
    protected $table = 'TiketTender';
    protected $primaryKey = 'id_tiket';
    protected $allowedFields = [
        'tanggal', 'user_id', 'role_id', 'tgl_diperlukan', 'tender_type', 'kode_tender', 'deskripsi_tender',
        'edc_baru', 'ket_edc_baru', 'GL_mapping_tender', 'karakteristik_tender', 'tgl_aktif', 'periode_aktif', 'status', 'CreatedAt', 'ModifiedAt'
    ];


    public function findByID($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }
        return false;
    }

    public function get_id_tiket($id_tiket)  //ini buat detail tiket
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name, roles.Name as role_name');
        $builder->join('users', 'TiketTender.user_id = users.OID');
        $builder->join('roles', 'roles.oid = TiketTender.role_id');
        $builder->where('id_tiket', $id_tiket);
        return $builder->get()->getRow();
    }

    public function getTiketWithUserAndRole() //ini buat list tiket
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name, roles.Name as role_name');
        $builder->join('users', 'users.oid = TiketTender.user_id');
        $builder->join('roles', 'roles.oid = TiketTender.role_id');
        return $builder->get()->getResultArray();
    }

    public function getTiketWithUserAndRole1($userId) //ini buat list tiket berdasarkan user ID
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name, roles.Name as role_name');
        $builder->join('users', 'users.oid = TiketTender.user_id');
        $builder->join('roles', 'roles.oid = TiketTender.role_id');
        $builder->where('TiketTender.user_id', $userId); // Menambahkan kondisi where berdasarkan user ID
        return $builder->get()->getResultArray();
    }
}
