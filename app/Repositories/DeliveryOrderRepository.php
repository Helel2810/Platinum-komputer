<?php

namespace App\Repositories;

use App\Models\DeliveryOrder;
use App\Repositories\BaseRepository;

/**
 * Class DeliveryOrderRepository
 * @package App\Repositories
 * @version August 24, 2019, 7:38 am UTC
*/

class DeliveryOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'send_date',
        'receive_date',
        'status',
        'order_id'
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
        return DeliveryOrder::class;
    }
}
