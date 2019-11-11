<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Courier
 * @package App\Models
 * @version August 24, 2019, 5:55 am UTC
 *
 * @property string name
 * @property string phone
 */
class Courier extends Model
{
    use SoftDeletes;

    public $table = 'couriers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone' => 'required|numeric'
    ];

    
}
