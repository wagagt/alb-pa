<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    
	public $table = "clientes";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"contacto_nombres",
		"contacto_apellidos",
		"telefono",
		"direccion",
		"email"
	];

	public static $rules = [
	    "nombre" => "required",
		"contacto_nombres" => "required",
		"contacto_apellidos" => "required",
		"email" => "required | email"
	];

	/* Relationed Fields*/
	public function proyectos(){
		//return $this->belongsTo('App\Models\Proyectos', 'id_proyecto');
		return $this->hasMany('App\Models\Proyectos');
	}
}
