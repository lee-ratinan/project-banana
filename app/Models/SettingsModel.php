<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_DELETED = 'DELETED';

    protected $table      = 'settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'setting_key',
        'setting_value',
        'created_by',
        'updated_by',
        'deleted_by',
        'key_status'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getSettingValueByKey($key, $include_deleted_key = false)
    {
        $this->where('setting_key', $key);
        if ( ! $include_deleted_key)
        {
            $this->where('key_status', self::STATUS_ACTIVE);
        }
        return $this->first()['setting_value'];
    }


//    protected $validationRules    = [];
//    protected $validationMessages = [];
//    protected $skipValidation     = false;
}