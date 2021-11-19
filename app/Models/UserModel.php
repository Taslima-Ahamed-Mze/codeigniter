<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ServiceModel;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['lastname','firstname','birthdate','phone','address','zip_code','service_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function listUser()
    {
        $builder = $this->db->table('users');
        $builder->select('users.*,service.name');
        $builder->join('service', 'service.id = users.service_id');
        $query = $builder->get();
        return $query->getResult();
    }
    public function findOne($id)
    {
        $builder = $this->db->table('users');
        $builder->select('users.*,service.name');
        $builder->join('service', 'service.id = users.service_id');
        $builder->where('users.id', $id);
        $query = $builder->get();
        return $query->getResult();
    }
    public function listUserByService($id)
    {
        $builder = $this->db->table('users');
        $builder->select('users.*,service.name');
        $builder->join('service', 'service.id = users.service_id');
        $builder->where('users.service_id', $id);
        $query = $builder->get();
        return $query->getResult();
    }
}
