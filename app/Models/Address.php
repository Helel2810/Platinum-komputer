<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version August 24, 2019, 6:46 am UTC
 *
 * @property string address
 * @property string recipient_name
 * @property string phone
 * @property integer customer_id
 * @property integer district_id
 * @property string post_code
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'address',
        'recipient_name',
        'phone',
        'customer_id',
        'district_id',
        'post_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'address' => 'string',
        'recipient_name' => 'string',
        'phone' => 'string',
        'customer_id' => 'integer',
        'district_id' => 'integer',
        'post_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address' => 'required',
        'recipient_name' => 'required',
        'phone' => 'required|numeric',
        'customer_id' => 'required|numeric',
        'district_id' => 'required',
        'post_code' => 'required|numeric'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }


}
