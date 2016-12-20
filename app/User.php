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
use App\Apartamento;
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
    return $query->where('name', 'LIKE', '%'.$name.'%')
    ->orWhere('usuario', 'like', "%" . $name . "%");
  }

  public function isAdmin()
  {
      if($this->tipo == 'admin'){
        return true;
      }else{
        return false;
      }
    
  }

  public function isPropietario()
  {

    if($this->tipo == 'propietario'){
      return true;
    }else{
      return false;
    }
  }

  public function chat_docts(){
      return $this->hasMany('App\Models\chat_docts');
  }

  public function isFirstLogin(){
      $userId = \Auth::user()->id;
      return (Activity_log::where ('user_id', '=', $userId)->count() == 1);
  }

  public function getTorre(){
    $userId = \Auth::user()->id;
    $torre = Apartamento::where ('user_id', '=', $userId)->select('torre_id')->firstOrFail();
    return($torre['torre_id']);
  }

}
