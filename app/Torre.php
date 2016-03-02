<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TorreController
 *
 * @author  The scaffold-interface created at 2016-03-02 08:02:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Torre extends Model
{

    public $timestamps = false;

    protected $table = 'torres';

	
	public function oficina()
	{
		return $this->belongsTo('App\Oficina');
	}

	
}
