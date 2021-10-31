<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogPostAccessModel extends Model {

    const ACCESS_LEVEL_ADMIN = 'ADMIN';
    const ACCESS_LEVEL_WRITE = 'WRITE';
    const ACCESS_LEVEL_READ = 'READ';

    protected $table = 'bnn_blog_post_access';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'post_id',
        'user_access_group_id',
        'user_id',
        'access_level',
        'granted_by',
        'revoked_by'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'granted_at';
    protected $updatedField = 'revoked_at';

}