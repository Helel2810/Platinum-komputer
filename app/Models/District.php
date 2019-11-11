<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class District
 * @package App\Models
 * @version August 24, 2019, 6:22 am UTC
 *
 * @property string name
 * @property integer city_id
 */
class District extends Model
{
    use SoftDeletes;

    public $table = 'districts';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function city()
    {
      return $this->belongsTo('City');
    }


}
