<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {

    const USERNAME_TYPE_EMAIL = 'EMAIL';
    const USERNAME_TYPE_TELEPHONE = 'TELEPHONE';
    const USERNAME_TYPE_ANY = 'ANY';

    const USER_STATUS_PENDING_APPROVAL = 'PENDING_APPROVAL';
    const USER_STATUS_ACTIVE = 'ACTIVE';
    const USER_STATUS_SUSPENDED = 'SUSPENDED';

    const USER_TYPE_PUBLIC_USER = 'PUBLIC_USER';
    const USER_TYPE_ADMIN = 'ADMIN';
    const USER_TYPE_SUPER_ADMIN = 'SUPER_ADMIN';

    const USER_PASSWORD_HASH = 'SHA256';

    protected $table = 'bnn_users';
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