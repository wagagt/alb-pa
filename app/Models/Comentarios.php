<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    
	public $table = "comentarios";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "comentario",
		"avance",
		"horas",
		"id_usuario",
		"id_usuario",
		"id_proyecto",
		"id_proyecto"
	];

	public static $rules = [
	    "comentario" => "required",
		"avance" => "required",
		"horas" => "required",
		"id_usuario" => "required",
		"id_proyecto" => "required"
	];

}
