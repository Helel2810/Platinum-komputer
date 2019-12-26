<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 * @package App\Models
 * @version August 17, 2019, 7:31 am UTC
 *
 * @property string image
 * @property string content
 * @property string source
 * @property string period
 * @property integer news_category_id
 * @property integer admin_id
 */
class News extends Model
{
    use SoftDeletes;

    public $table = 'news';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'image',
        'title',
        'content',
        'source',
        'period',
        'news_category_id',
        'admin_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'image' => 'string',
        'content' => 'string',
        'source' => 'string',
        'period' => 'datetime',
        'news_category_id' => 'integer',
        'admin_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required',
        'title' => 'required',
        'content' => 'required',
        'source' => 'required',
        'period' => 'required',
        'news_category_id' => 'required',
    ];


}
