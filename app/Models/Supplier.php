<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @version August 17, 2019, 6:51 am UTC
 *
 * @property string name
 * @property string address
 * @property string status
 */
class Supplier extends Model
{
    use SoftDeletes;

    public $table = 'suppliers';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'address',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'status' => 'required'
    ];

    public function purchase_invoices()
    {
        return $this->hasMany('App\Models\PurchaseInvoice');
    }


}
