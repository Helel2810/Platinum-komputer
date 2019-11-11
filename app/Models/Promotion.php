<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Promotion
 * @package App\Models
 * @version August 24, 2019, 7:09 am UTC
 *
 * @property float nominal
 * @property string start_date
 * @property string end_date
 * @property string status
 */
class Promotion extends Model
{
    use SoftDeletes;

    public $table = 'promotions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'nominal' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'status' => 'required'
    ];

    
}
