<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
	public $table = "clients";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"contact_name",
		"contact_last_name",
		"email",
		"tels",
		"address"
	];

	public static $rules = [
	    "name" => "required",
		"email" => "required",
		"tels" => "required",
		"address" => "required"
	];

}
