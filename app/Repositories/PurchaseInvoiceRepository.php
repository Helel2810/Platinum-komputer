<?php

namespace App\Repositories;

use App\Models\PurchaseInvoice;
use App\Repositories\BaseRepository;

/**
 * Class PurchaseInvoiceRepository
 * @package App\Repositories
 * @version August 17, 2019, 7:22 am UTC
*/

class PurchaseInvoiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'note',
        'supplier_id',
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
        return PurchaseInvoice::class;
    }
}
