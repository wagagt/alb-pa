<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
	public $table = "users";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "name",
		"contact_fname",
		"contact_lname",
		"email",
		"id_cliente",
		"id_rol",
		"password"
	];

	public static $rules = [
	    "name" => "required",
		"contact_fname" => "required",
		"contact_lname" => "required",
		"email" => "required | email ",
		"id_cliente" => "required",
		"id_rol" => "required",
		"password" => "required|min:6|confirmed",
		"password_confirmation" => "required|min:6"
	];

}
