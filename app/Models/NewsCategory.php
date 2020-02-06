<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NewsCategory
 * @package App\Models
 * @version August 17, 2019, 7:23 am UTC
 *
 * @property string name
 */
class NewsCategory extends Model
{
    use SoftDeletes;

    public $table = 'news_categories';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function news()
    {
      return $this->hasMany('App\Models\News');
    }


}
