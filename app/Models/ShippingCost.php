<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ShippingCost
 * @package App\Models
 * @version August 24, 2019, 7:24 am UTC
 *
 * @property float price
 * @property integer shipping_method_id
 * @property integer courier_id
 * @property integer district_id
 */
class ShippingCost extends Model
{
    use SoftDeletes;

    public $table = 'shipping_costs';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'price',
        'shipment_method_id',
        'courier_id',
        'district_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'float',
        'shipment_method_id' => 'integer',
        'courier_id' => 'integer',
        'district_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'price' => 'required',
        'shipment_method_id' => 'required',
        'courier_id' => 'required',
        'district_id' => 'required'
    ];

    public function orders()
    {
      return $this->hasMany('App\Models\Order');
    }

    public function courier()
    {
      return $this->belongsTo('App\Models\Courier');
    }

    public function shipmentMethod()
    {
      return $this->belongsTo('App\Models\ShipmentMethod');
    }

    public function district()
    {
      return $this->belongsTo('App\Models\District');
    }





}
