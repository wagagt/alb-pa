<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    
	public $table = "estados";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "descripcion"
	];

	public static $rules = [
	    "descripcion" => "required"
	];

}
