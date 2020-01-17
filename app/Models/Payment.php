<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * @package App\Models
 * @version December 11, 2019, 7:40 am UTC
 *
 * @property string payment_date
 * @property string status
 * @property string payment_method
 * @property string bank_account
 * @property integer order_id
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'payment_date',
        'status',
        'payment_method',
        'bank_account',
        'order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_date' => 'date',
        'status' => 'string',
        'payment_method' => 'string',
        'bank_account' => 'string',
        'order_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }



}
