<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
    protected $table = 'TiketTender';
    protected $primaryKey = 'id_tiket';
    protected $allowedFields = [
        'tgl_pengajuan', 'user_id', 'role_id', 'tgl_diperlukan', 'tender_type', 'kode_tender', 'deskripsi_tender',
        'edc_baru', 'ket_edc_baru', 'GL_mapping_tender', 'karakteristik_tender', 'ket_karakteristik_tender', 'status'
    ];

    public function get_id_tiket($id_tiket)
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name, roles.Name as role_name');
        $builder->join('users', 'TiketTender.user_id = users.OID');
        $builder->join('roles', 'roles.oid = TiketTender.role_id');
        $builder->where('id_tiket', $id_tiket);
        return $builder->get()->getRow();
    }

    public function getTiketWithUserAndRole()
    {
        $builder = $this->db->table($this->table);
        $builder->select('TiketTender.*, users.Name as user_name, roles.Name as role_name');
        $builder->join('users', 'users.oid = TiketTender.user_id');
        $builder->join('roles', 'roles.oid = TiketTender.role_id');
        return $builder->get()->getResultArray();
    }
}
