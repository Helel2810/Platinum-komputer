<?php

namespace App\Repositories;

use App\Models\NewsComment;
use App\Repositories\BaseRepository;

/**
 * Class NewsCommentRepository
 * @package App\Repositories
 * @version August 24, 2019, 5:39 am UTC
*/

class NewsCommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'news_id',
        'customer_id',
        'content'
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
        return NewsComment::class;
    }
}
