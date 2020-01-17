<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DeliveryOrder
 * @package App\Models
 * @version August 24, 2019, 7:38 am UTC
 *
 * @property string send_date
 * @property string receive_date
 * @property string status
 * @property integer order_id
 */
class DeliveryOrder extends Model
{
    use SoftDeletes;

    public $table = 'delivery_orders';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'send_date',
        'receive_date',
        'status',
        'order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'send_date' => 'datetime',
        'receive_date' => 'datetime',
        'status' => 'string',
        'order_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'send_date' => 'required',
        'status' => 'required',
        'order_id' => 'required'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }



}
