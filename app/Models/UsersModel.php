<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'username',
        'username_type',
        'password',
        'password_expiry',
        'user_status',
        'user_email',
        'user_phone',
        'user_first_name',
        'user_last_name',
        'user_gender',
        'user_type',
        'user_locale',
        'registered_by',
        'updated_by',
        'suspended_by'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'suspended_at';

}