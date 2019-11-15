<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version August 17, 2019, 7:15 am UTC
 *
 * @property string name
 * @property float price
 * @property integer stock
 * @property string sku
 * @property string description
 * @property float weight
 * @property integer category_id
 * @property integer sub_category_id
 * @property integer brand_id
 * @property integer admin_id
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'price',
        'stock',
        'sku',
        'description',
        'weight',
        'image1',
        'image2',
        'image3',
        'image4',
        'category_id',
        'sub_category_id',
        'brand_id',
        'admin_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'float',
        'stock' => 'integer',
        'sku' => 'string',
        'description' => 'string',
        'weight' => 'float',
        'image1' => 'string',
        'image2' => 'string',
        'image3' => 'string',
        'image4' => 'string',
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'brand_id' => 'integer',
        'admin_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'sku' => 'required',
        'weight' => 'required',
        'description' => 'required',
        /*
        'image1' => 'image|mimes:jpeg,png,jpg,gif',
        'image2' => 'image|mimes:jpeg,png,jpg,gif',
        'image3' => 'image|mimes:jpeg,png,jpg,gif',
        'image4' => 'image|mimes:jpeg,png,jpg,gif',
        */
        'category_id' => 'required',
        'brand_id' => 'required',
    ];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
