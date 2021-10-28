<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model {

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_DELETED = 'DELETED';

    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'setting_key',
        'setting_value',
        'created_by',
        'updated_by',
        'deleted_by',
        'key_status'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    /**
     * Retrieve setting value from the key
     * @param string $key The key to find
     * @param bool $include_deleted_key A flag whether to check for setting status
     * @return string
     */
    public function getSettingValueByKey($key, $include_deleted_key = FALSE)
    {
        $this->where('setting_key', $key);
        if ( ! $include_deleted_key)
        {
            $this->where('key_status', self::STATUS_ACTIVE);
        }
        return $this->first()['setting_value'];
    }

}