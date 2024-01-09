<?php

namespace App\Models;

use CodeIgniter\Model;

class TenderModel extends Model
{
    protected $table = 'TiketTender';
    protected $primaryKey = 'id_tiket';
    protected $useTimestamps = true;
    protected $createdField  = 'CreatedAt';
    protected $updatedField  = 'ModifiedAt';
    protected $allowedFields = [
        'tanggal', 'user_id', 'role_id', 'tgl_diperlukan', 'tender_type', 'kode_tender', 'deskripsi_tender',
        'edc_baru', 'ket_edc_baru', 'GL_mapping_tender', 'karakteristik_tender', 'tgl_aktif', 'periode_aktif', 'status',
        'CreatedAt', 'ModifiedAt', 'approved1', 'approved2'
    ];

    public function changeStatusByRoleId($role_id, $newStatus)
    {
        $data = [
            'status' => $newStatus,
        ];

        $this->where('role_id', $role_id)->update($data);

        return $this->affectedRows() > 0;
    }

    public function getUserNameById($user_id)
    {
        $user = $this->db->table('users')->select('name')->where('id', $user_id)->get()->getRow();
        return ($user) ? $user->name : '';
    }

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

    public function get_approval_status($id_tiket)
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*');
        $builder->where('id_tiket', $id_tiket);
        return $builder->get()->getRow('status');
    }

    public function get_userapprove1($id_tiket)
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name');
        $builder->join('users', 'TiketTender.approved1 = users.OID');
        $builder->where('id_tiket', $id_tiket);
        return $builder->get()->getRow();
    }

    public function get_userapprove2($id_tiket)
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name');
        $builder->join('users', 'TiketTender.approved2 = users.OID');
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

    public function getTiketWithUserAndRole1($userId) //ini buat history tiket berdasarkan user ID
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name, roles.Name as role_name');
        $builder->join('users', 'users.oid = TiketTender.user_id');
        $builder->join('roles', 'roles.oid = TiketTender.role_id');
        $builder->where('TiketTender.user_id', $userId); // Menambahkan kondisi where berdasarkan user ID
        return $builder->get()->getResultArray();
    }

    public function getTiketsesuairole($roleId) //ini buat list tiket berdasarkan role ID
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name, roles.Name as role_name');
        $builder->join('users', 'users.oid = TiketTender.user_id');
        $builder->join('roles', 'roles.oid = TiketTender.role_id');
        $builder->where('TiketTender.role_id', $roleId);
        return $builder->get()->getResultArray();
    }
}
