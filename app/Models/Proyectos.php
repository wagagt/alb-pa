<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    
	public $table = "proyectos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nombre",
		"profundidad",
		"perforado",
		"maquina",
		"metodo",
		"observaciones",
		"id_estado",
		"id_estado",
		"id_cliente",
		"id_cliente"
	];

	public static $rules = [
	    "nombre" => "required",
		"id_estado" => "required",
		"id_cliente" => "required"
	];

}
