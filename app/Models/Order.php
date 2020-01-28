<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version August 24, 2019, 6:57 am UTC
 *
 * @property string status
 * @property integer customer_id
 * @property integer admin_id
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'customer_id',
        'admin_id',
        'shipping_cost_id',
        'address_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'string',
        'customer_id' => 'integer',
        'admin_id' => 'integer',
        'shipping_cost_id' => 'integer',
        'address_id' => 'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        'customer_id' => 'required'
    ];

    public function payment()
    {
        return $this->hasOne('App\Models\Payment');
    }

    public function shippingCost()
    {
        return $this->belongsTo('App\Models\ShippingCost');
    }


    public function deliveryOrder()
    {
        return $this->hasOne('App\Models\DeliveryOrder');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('qty');
    }

    public function customer()
    {
      return $this->belongsTo('App\Models\Customer');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }





}
