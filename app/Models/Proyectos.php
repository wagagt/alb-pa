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
		"id_cliente"
	];

	public static $rules = [
	    "nombre" => "required",
		"id_estado" => "required",
		"id_cliente" => "required"
	];
	
		
	/* Relationed Fields*/
	public function estado()
	{
		//dd($this->belongsTo('App\Models\Roles'));
		return $this->belongsTo('App\Models\Estados', 'id_estado');
	}
	
	public function cliente()
	{
		//dd($this->belongsTo('App\Models\Roles'));
		return $this->belongsTo('App\Models\Clientes', 'id_cliente');
	}

}
