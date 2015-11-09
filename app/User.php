<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'name', 
        'email',
        'password', 
        'first_name', 
        'last_name', 
        'locale',
        'gender', 
        'date_of_birth', 
        'has_migraines', 
        'has_diabetes', 
        'has_glasses', 
        'last_eye_exam'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that can not have values assigned to them directly
     * 
     * @var array
     */
    protected $guarded = [];
    
    public function journals()
    {
        return $this->hasMany('App\Journal');
    }

    public function medicines()
    {
        return $this->hasMany('App\Medicine');
    }

    public function triggers()
    {
        return $this->hasMany('App\Trigger');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    public function hasAccessTo($id)
    {
        return $this->id == $id;
    }
    
    
}
