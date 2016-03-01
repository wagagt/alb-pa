<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OficinaController
 *
 * @author  The scaffold-interface created at 2016-03-01 07:10:33am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Oficina extends Model
{

    public $timestamps = false;

    protected $table = 'oficinas';

	
	public function paise()
	{
		return $this->belongsTo('App\Paise');
	}

	
}
