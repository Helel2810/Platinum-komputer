<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductComment
 * @package App\Models
 * @version January 22, 2020, 6:12 am UTC
 *
 * @property integer stars
 * @property string content
 * @property integer product_id
 */
class ProductComment extends Model
{
    use SoftDeletes;

    public $table = 'product_comments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'stars',
        'content',
        'product_id',
        'customer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stars' => 'integer',
        'content' => 'string',
        'product_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }




}
