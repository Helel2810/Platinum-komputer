<?php

namespace App\Repositories;

use App\Models\Courier;
use App\Repositories\BaseRepository;

/**
 * Class CourierRepository
 * @package App\Repositories
 * @version August 24, 2019, 5:55 am UTC
*/

class CourierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'phone'
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
        return Courier::class;
    }
}
