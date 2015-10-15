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
		"email" => "required"
	];

}
