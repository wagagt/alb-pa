<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Automoviles_aptoController
 *
 * @author  The scaffold-interface created at 2016-04-03 03:16:17am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Automoviles_apto extends Model
{
      use softDeletes;


    protected $table = 'automoviles_aptos';
    protected $fillable = ['modelo', 'placa','apto_id','marca_id'];
    protected $dates = ['deleted_at'];

    public function apartamento(){
      return $this->belongsTo('App\Apartamento','apto_id');
    }

    public function marca(){
      return $this->belongsTo('App\Marca_vehiculo', 'marca_id');
    }

    public function scopeSearch($query, $placa)
    {
        return $query->where('placa', 'LIKE', '%'.$placa.'%');
    }


}
