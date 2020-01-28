<?php

namespace App\Repositories;

use App\Models\ProductComment;
use App\Repositories\BaseRepository;

/**
 * Class ProductCommentRepository
 * @package App\Repositories
 * @version January 22, 2020, 6:12 am UTC
*/

class ProductCommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stars',
        'content',
        'product_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProductComment::class;
    }
}
