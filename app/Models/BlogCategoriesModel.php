<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogCategoriesModel extends Model {

    protected $table = 'bnn_blog_categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'category_name',
        'category_slug',
        'category_name_locales',
        'category_description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

}