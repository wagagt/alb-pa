<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cxc extends Model
{
    protected $table = 'cxc';
    protected $dates = ['fecha_inicio_cobro', 'fecha_fin_cobro', 'created_at', 'updated_at'];

    protected $fillable = [
        'nombre',
        'descripcion',
        'monto',
        'mora',
        'fecha_inicio_cobro',
        'fecha_fin_cobro',
        'recurrencia',
        'dia_del_mes',
        'satus',
        'torre_id'
    ];


    public static $rules = [
        'nombre'                  => 'required',
        'descripcion'             => 'required',
        'monto'                   => 'required',
        'mora'                    => 'required',
        'fecha_inicio_cobro'      => 'required',
        'recurrencia'             => 'required',
        'dia_del_mes'             => 'required',
        'status'                  => 'required',
        'torre_id'                => 'required'
    ];

    public function torre(){
        return $this->belongsTo('App\Torre','torre_id');
    }

    public function apto(){
        return $this->belongsToMany('App\Apartamento', 'cxc_aptos', 'cxc_id','apto_id');
    }


}
