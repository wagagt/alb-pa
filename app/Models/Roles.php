<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    
	public $table = "roles";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "descripcion"
	];

	public static $rules = [
	    "descripcion" => "required"
	];

}
  