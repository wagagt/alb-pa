<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_documento extends Model
{
	use softDeletes;
    protected $table = 'tipo_documentos';
    protected $fillable = ['descripcion', 'torre_id'];
    protected $dates = ['deleted_at'];

     public function scopeSearch($query, $name)
     {
    	 return $query->where('descripcion', 'LIKE', '%'.$name.'%');
     }

		public function documentos(){
			return $this->hasMany('App\Documento');
		}
		
		public function torre()
		{
		  return $this->belongsTo('App\Torre');
		}

}
