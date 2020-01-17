<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 * @package App\Models
 * @version August 24, 2019, 6:12 am UTC
 *
 * @property string name
 * @property integer province_id
 */
class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'province_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'province_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function province()
    {
      return $this->belongsTo('App\Models\Province');
    }

    public function districts()
    {
      return $this->hasMany('App\Models\District');
    }


}
