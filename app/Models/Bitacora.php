<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    
	public $table = "bitacoras";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "accion",
		"id_usuario"
	];

	public static $rules = [
	    "accion" => "required",
		"id_usuario" => "required"
	];
/* Relationed fields */

	public function usuario(){
		return $this->belongsTo('App\Models\Users', 'id_usuario');
	}

}
