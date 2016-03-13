<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class DocumentoController
 *
 * @author  The scaffold-interface created at 2016-03-12 06:04:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Documento extends Model
{

	use softDeletes;

    public $timestamps = false;

    protected $table = 'documentos';

    protected $fillable =['nombre', 'tipo_documentos_id', 'fecha_del', 'fecha_al', 'user_id'];
	
  public function  scopeSearch($query, $name)
  {
    return $query->where('nombre', 'LIKE', '%'.$name.'%');
  }
}


