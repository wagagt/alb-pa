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
		"id_proyecto"
	];

	public static $rules = [
	    "comentario" => "required",
		"avance" => "required",
		"horas" => "required",
		"id_proyecto" => "required"
	];
	
	public function proyecto()
	{
		//dd($this->belongsTo('App\Models\Roles'));
		return $this->belongsTo('App\Models\Proyectos', 'id_proyecto');
	}

}
