<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\BaseRepository;

/**
 * Class SliderRepository
 * @package App\Repositories
 * @version November 15, 2019, 8:11 am UTC
*/

class SliderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'start_date',
        'end_date',
        'product_id',
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
        return Slider::class;
    }
}
