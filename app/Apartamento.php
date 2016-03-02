<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ApartamentoController
 *
 * @author  The scaffold-interface created at 2016-03-02 08:11:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Apartamento extends Model
{

    public $timestamps = false;

    protected $table = 'apartamentos';


	public function torre()
	{
		return $this->belongsTo('App\Torre');
	}

  public function user()
    {
        return $this->belongsTo('App\User');
    }

}
