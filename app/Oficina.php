<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OficinaController
 *
 * @author  The scaffold-interface created at 2016-03-02 07:49:59pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Oficina extends Model
{



    protected $table = 'oficinas';

    protected $fillable = ['nombre',  'direccion', 'niveles', 'pais_id'];
    protected $dates = ['deleted_at'];

public function oficinas()
{

    return $this->hasMany('App\Torre');

}

	public function paise()
	{
		return $this->belongsTo('App\Paise');
	}

  public function  scopeSearch($query, $name)
  {
    return $query->where('nombre', 'LIKE', '%'.$name.'%');
  }


}
