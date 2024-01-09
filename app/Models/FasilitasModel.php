<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table = 'TiketFasilitas';
    protected $primaryKey = 'id_tiket';
    protected $allowedFields = ['id_tiket', 'tanggal', 'store', 'nik', 'dept', 'nama', 'code', 'jabatan', 'komputer', 'type_device', 'email', 'aksesUsb', 'aksesInternet', 'wifi', 'vpn', 'akses', 'keterangan1', 'keterangan2', 'keterangan3', 'aplikasi', 'type_user', 'status'];

    public function getStore() //ini buat list tiket
    {
        $builder = $this->db->table($this->table);
        return $builder->get()->getResultArray();
    }


    public function getFasilitas()
    {
        return $this->findAll();
    }

    public function get_id_tiket($id_tiket)  //ini buat detail tiket
    {
        $builder = $this->db->table($this->table);

        $builder->select('TiketFasilitas.*');
        // $builder->join('users', 'TiketFasilitas.user_id = users.OID');
        $builder->where('id_tiket', $id_tiket);
        return $builder->get()->getRow();
    }

    public function findByID($id)
    {
        $data = $this->find($id);
        if ($data) {
            return $data;
        }
        return false;
    }
}
