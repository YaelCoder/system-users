<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'firstname',
        'lastname',
        'gender',
        'email',
        'phone',
        'id_address',
        'id_user_type',
        'register_date',
        'status',
        'created_at',
        'updated_at', 
        'deleted_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'firstname' => 'required',
        'lastname' => 'required',
        'gender' => 'required',
        'email' => 'required|valid_email',
        'phone' => 'required',
        'id_address' => 'required|numeric',
        'id_user_type' => 'required|numeric',
        'register_date' => 'required',
        'status' => 'required',
    ];
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

    public function getUsersWithRelations()
    {
        return $this->select('user.*, address.*, user_type.*, credential.username')
                    ->join('address', 'address.id_address = user.id_address', 'left')
                    ->join('user_type', 'user_type.id_user_type = user.id_user_type', 'left')
                    ->join('credential', 'credential.id_user = user.id_user', 'left')
                    ->findAll();
    }
}
