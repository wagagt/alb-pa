<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    
	public $table = "usuarios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"contacto_nombres",
		"contacto_apellidos",
		"id_rol",
		"id_rol",
		"id_cliente",
		"id_cliente"
	];

	public static $rules = [
	    "nombre" => "required",
		"contacto_nombres" => "required",
		"contacto_apellidos" => "required",
		"id_rol" => "required",
		"id_cliente" => "required"
	];

}
