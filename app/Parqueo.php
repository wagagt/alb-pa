<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ParqueoController
 *
 * @author  The scaffold-interface created at 2016-04-02 07:57:39pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Parqueo extends Model
{
    use softDeletes;

    protected $table = 'parqueos';
    protected $fillable = ['numero', 'apto_id','asignado'];
    protected $dates = ['deleted_at'];

    public function apartamento(){
      return $this->belongsTo('App\Apartamento', 'apto_id');
    }

    public function scopeSearch($query, $numero)
    {
        return $query->where('numero', 'LIKE', '%'.$numero.'%');
    }


}
