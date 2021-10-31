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

    const UNIQUE_FIELD_ID = 'id';
    const UNIQUE_FIELD_USERNAME = 'username';
    const UNIQUE_FIELD_EMAIL = 'user_email';
    const UNIQUE_FIELD_PHONE = 'user_phone';

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
    protected $uniqueFields = [
        'id',
        'username',
        'user_email',
        'user_phone',
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'suspended_at';

    /**
     * Get user by $columnName
     * @param string $columnName Use the constant of this class, either UNIQUE_FIELD_ID, UNIQUE_FIELD_USERNAME, UNIQUE_FIELD_EMAIL, or UNIQUE_FIELD_PHONE
     * @param string|int $value The value to find
     * @return object|bool
     */
    public function getUserBy(string $columnName, $value)
    {
        if ( ! in_array($columnName, $this->uniqueFields))
        {
            return FALSE;
        }
        return $this->where($columnName, $value)->first();
    }
}