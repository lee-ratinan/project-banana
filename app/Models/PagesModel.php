<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model {

    protected $table = 'bnn_pages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'page_title',
        'page_tags',
        'page_content',
        'page_status',
        'published_at',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}