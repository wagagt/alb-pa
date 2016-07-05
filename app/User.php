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
use App\Models\Activity_log;
use Illuminate\Contracts\Auth\Guard;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword, softDeletes;

  protected $table = 'users';

  protected $fillable = ['name',  'usuario', 'email', 'pasaporte', 'cedula', 'password', 'tipo', 'status', 'observaciones'];


  protected $hidden = ['password', 'remember_token'];
  protected $dates = ['deleted_at'];

  public static $rules = [
        'name'                    => 'required',
        'usuario'                 => 'required',
        'status_id'               => 'required',
        'email'                   => 'required',
        'password'                => 'required|min:3|confirmed',
        'password_confirmation'   => 'required|min:3'
  ];


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

  public function isAdmin()
  {
    return ($this->tipo ==  'admin')?true:false;
  }

  public function isPropietario()
  {
    return ($this->tipo ==  'propietario')?true:false;
  }

  public function chat_docts(){
      return $this->hasMany('App\Models\chat_docts');
  }

  public function isFirstLogin(){
      $userId = \Auth::user()->id;
      return (Activity_log::where ('user_id', '=', $userId)->count() == 1);
  }

}
