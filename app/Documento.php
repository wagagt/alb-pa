<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DocumentoController
 *
 * @author  The scaffold-interface created at 2016-03-12 06:04:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */

class Documento extends Model {

	use softDeletes;

	//git stpublic $timestamps = false;

	protected $table = 'documentos';

	protected $fillable = ['nombre', 'tipo_documentos_id', 'fecha_del', 'fecha_al', 'torre_id'];
	protected $dates    = ['deleted_at'];

	public function scopeSearch($query, $name) {
		return $query->where('nombre', 'LIKE', '%'.$name.'%');
	}

	public function tipo_documento(){
	  	return $this->belongsTo('App\Tipo_documento', 'tipo_documentos_id');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}


public function torre(){
		return $this->belongsTo('App\Torre', 'torre_id');
	}


}
