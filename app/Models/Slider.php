<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package App\Models
 * @version November 15, 2019, 8:11 am UTC
 *
 * @property string image
 * @property string start_date
 * @property string end_date
 * @property integer product_id
 * @property integer brand_id
 */
class Slider extends Model
{
    use SoftDeletes;

    public $table = 'sliders';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'image',
        'start_date',
        'end_date',
        'product_id',
        'brand_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'product_id' => 'integer',
        'brand_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];


}
