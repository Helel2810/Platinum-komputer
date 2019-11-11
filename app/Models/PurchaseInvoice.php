<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PurchaseInvoice
 * @package App\Models
 * @version August 17, 2019, 7:22 am UTC
 *
 * @property string status
 * @property string note
 * @property integer supplier_id
 * @property integer product_id
 */
class PurchaseInvoice extends Model
{
    use SoftDeletes;

    public $table = 'purchase_invoices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'note',
        'supplier_id',
        'product_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'string',
        'note' => 'string',
        'supplier_id' => 'integer',
        'product_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        'supplier_id' => 'required',
        'product_id' => 'required'
    ];

    
}
