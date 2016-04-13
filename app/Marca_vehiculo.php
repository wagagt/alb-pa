<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Marca_vehiculoController
 *
 * @author  The scaffold-interface created at 2016-04-02 06:37:07pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Marca_vehiculo extends Model
{
    use softDeletes;

    protected $table = 'marca_vehiculos';
    protected $fillable = ['marca'];
    protected $dates =  ['deleted_at'];

    public function automoviles(){
      return $this->hasMany('App\Automoviles_apto');
    }


    public function scopeSearch($query, $marca)
    {
      return $query->where('marca', 'LIKE', '%'.$marca.'%');
    }

}
