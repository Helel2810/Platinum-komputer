<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admin
 * @package App\Models
 * @version August 17, 2019, 5:44 am UTC
 *
 * @property string user_name
 * @property string password
 * @property string email
 * @property string status
 * @property integer admin_role_id
 */
class Admin extends Authenticatable
{
    use SoftDeletes;

    public $table = 'admins';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_name',
        'password',
        'email',
        'status',
        'admin_role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_name' => 'string',
        'password' => 'string',
        'email' => 'string',
        'status' => 'string',
        'admin_role_id' => 'integer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_name' => 'required',
        'password' => 'required|min:6',
        'email' => 'required',
        'status' => 'required',
        'admin_role_id' => 'required'
    ];

    public function admin_role()
    {
        return $this->belongsTo('App\Models\AdminRole');
    }


}
