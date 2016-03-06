<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaiseController
 *
 * @author  The scaffold-interface created at 2016-03-02 07:24:51pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Paise extends Model
{

    //public $timestamps = false;

    protected $table = 'paises';
    

    protected $fillable = ['pais',  'ciudad'];
    protected $dates = ['deleted_at'];


    public function  scopeSearch($query, $name)
    {
      return $query->where('pais', 'LIKE', '%'.$name.'%');
    }


}
