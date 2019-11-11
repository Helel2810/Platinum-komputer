<?php

namespace App\Repositories;

use App\Models\ShipmentMethod;
use App\Repositories\BaseRepository;

/**
 * Class ShipmentMethodRepository
 * @package App\Repositories
 * @version August 24, 2019, 7:11 am UTC
*/

class ShipmentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return ShipmentMethod::class;
    }
}
