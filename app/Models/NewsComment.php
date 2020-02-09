<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NewsComment
 * @package App\Models
 * @version August 24, 2019, 5:39 am UTC
 *
 * @property integer news_id
 * @property integer customer_id
 * @property string content
 */
class NewsComment extends Model
{
    use SoftDeletes;

    public $table = 'news_comments';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'news_id',
        'customer_id',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'news_id' => 'integer',
        'customer_id' => 'integer',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function news()
    {
      return $this->belongsTo('App\Models\News');
    }

    public function customer()
    {
      return $this->belongsTo('App\Models\Customer');
    }



}
