<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogsModel extends Model {

    protected $table = 'bnn_blogs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'blog_name',
        'blog_description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}