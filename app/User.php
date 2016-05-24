<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword, softDeletes;

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
  protected $fillable = ['name',  'usuario', 'email', 'pasaporte', 'cedula', 'password', 'tipo', 'status', 'observaciones'];

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $hidden = ['password', 'remember_token'];
  protected $dates = ['deleted_at'];

  public function apartamento()
  {
    return $this->hasOne('App\Apartamento');
  }

  public function setPasswordAttribute($value)
  {
    if(!empty($value))
    {

      $this->attributes['password'] = \Hash::make($value);

    }
  }

  public function  scopeSearch($query, $name)
  {
    return $query->where('name', 'LIKE', '%'.$name.'%');
  }

  public function admin()
  {
    return $this->tipo !=  'propietario';
  }

  public function isPropietario()
  {
    return ($this->tipo ==  'propietario')?true:false;
  }

  public function chat_docts(){
      return $this->hasMany('App\Models\chat_docts');
    }

}
