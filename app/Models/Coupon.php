<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coupon
 * @package App\Models
 * @version September 6, 2019, 7:47 am UTC
 *
 * @property string name
 * @property float nominal
 * @property string start_date
 * @property string end_date
 * @property string status
 */
class Coupon extends Model
{
    use SoftDeletes;

    public $table = 'coupons';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'nominal',
        'start_date',
        'end_date',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'nominal' => 'float',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'nominal' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'status' => 'required'
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }


}
