<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TorreController
 *
 * @author  The scaffold-interface created at 2016-03-02 08:02:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Torre extends Model
{
    use softDeletes;

    protected $table = 'torres';

    protected $fillable = ['nombre',  'direccion', 'niveles', 'oficina_id'];
    protected $dates = ['deleted_at'];



	public function oficina()
	{
		return $this->belongsTo('App\Oficina');
	}

  public function apartamentos()
  {
    return $this->hasMany('App\Apartamento');
  }

  public function  scopeSearch($query, $name)
  {
    return $query->where('nombre', 'LIKE', '%'.$name.'%');
  }

}
