<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogPostsModel extends Model {

    const POST_STATUS_DRAFT = 'DRAFT';
    const POST_STATUS_PUBLISHED = 'PUBLISHED';

    protected $table = 'bnn_blog_posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'blog_id',
        'post_title',
        'post_slug',
        'category_id',
        'post_tags',
        'post_content',
        'post_status',
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