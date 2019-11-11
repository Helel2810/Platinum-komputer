<?php

namespace App\Repositories;

use App\Models\ShippingCost;
use App\Repositories\BaseRepository;

/**
 * Class ShippingCostRepository
 * @package App\Repositories
 * @version August 24, 2019, 7:24 am UTC
*/

class ShippingCostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'price',
        'shipping_method_id',
        'courier_id',
        'district_id'
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
        return ShippingCost::class;
    }
}
