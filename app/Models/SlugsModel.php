<?php

namespace App\Models;

use CodeIgniter\Database\BaseResult;
use CodeIgniter\Model;
use ReflectionException;

class SlugsModel extends Model {

    const TYPE_PAGE = 'P';
    const TYPE_BLOG = 'B';

    protected $table = 'bnn_slugs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'url_slug',
        'blog_id',
        'page_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    /**
     * Add slug
     * @param string $slug The slug
     * @param int $objectId Either page_id or blog_id
     * @param string $objectType Use the constant of this class, either TYPE_PAGE or TYPE_BLOG
     * @param int $createdBy The user ID of the person who created this slug
     * @return BaseResult|false|int|object|string
     * @throws ReflectionException
     */
    public function addSlug (string $slug, int $objectId, string $objectType, int $createdBy)
    {
        $field = 'blog_id';
        if (self::TYPE_PAGE == $objectType)
        {
            $field = 'page_id';
        }
        $data = [
            'url_slug' => $slug,
            $field => $objectId,
            'created_by' => $createdBy
        ];
        return $this->insert($data);
    }

}