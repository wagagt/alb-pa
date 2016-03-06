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



  protected $table = 'apartamentos';

  protected $fillable =
  [
    'numero',
    'nivel',
    'cantidad_banios',
    'metros_cuadrados',
    'ambientes',
    'dormitorios',
    'marca_v_1',
    'modelo_v_1',
    'placa_v_1',
    'marca_v_2',
    'modelo_v_2',
    'placa_v_2',
    'torre_id',
    'user_id'
  ];

  protected $dates = ['deleted_at'];

  public function torre()
  {
    return $this->belongsTo('App\Torre');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }



}
