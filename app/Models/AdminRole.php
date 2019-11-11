<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AdminRole
 * @package App\Models
 * @version August 17, 2019, 5:25 am UTC
 *
 * @property string admin_role
 */
class AdminRole extends Model
{
    use SoftDeletes;

    public $table = 'admin_roles';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'admin_role'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'admin_role' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'admin_role' => 'required'
    ];

    public function admins()
    {
        return $this->hasMany('App\Models\Admin');
    }


}
