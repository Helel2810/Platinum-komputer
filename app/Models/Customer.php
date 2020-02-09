<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


/**
 * Class Customer
 * @package App\Models
 * @version August 17, 2019, 6:47 am UTC
 *
 * @property string user_name
 * @property string password
 * @property string email
 * @property string gender
 * @property string telephone
 * @property string full_name
 * @property string status
 */
class Customer extends Authenticatable
{
    use SoftDeletes;

    use Notifiable;

    public $table = 'customers';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_name',
        'password',
        'email',
        'gender',
        'telephone',
        'full_name',
        'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'integer',
        'user_name' => 'string',
        'password' => 'string',
        'email' => 'string',
        'gender' => 'string',
        'telephone' => 'string',
        'full_name' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_name' => 'required|unique:customers',
        'password' => 'required|confirmed|min:6',
        'email' => 'required|email|unique:customers',
        'gender' => 'required',
        'telephone' => 'required|numeric',
        'full_name' => 'required',
        'status' => 'required'
    ];

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function newsComments()
    {
        return $this->hasMany('App\Models\NewsComment');
    }





}
