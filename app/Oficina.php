<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OficinaController
 *
 * @author  The scaffold-interface created at 2016-03-02 07:49:59pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Oficina extends Model
{

    public $timestamps = false;

    protected $table = 'oficinas';

public function oficinas()
{

    return $this->hasMany('App\Torre');

}

	public function paise()
	{
		return $this->belongsTo('App\Paise');
	}


}
