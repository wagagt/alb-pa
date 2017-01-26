<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Tipo_documentoController
 *
 * @author  The scaffold-interface created at 2016-03-12 01:24:24pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Tipo_documento extends Model
{
	use softDeletes;
    protected $table = 'tipo_documentos';
    protected $fillable = ['descripcion', 'id_torre'];
    protected $dates = ['deleted_at'];

     public function scopeSearch($query, $name)
     {
    	 return $query->where('descripcion', 'LIKE', '%'.$name.'%');
     }

		public function documentos(){
			return $this->hasMany('App\Documento');
		}

}
