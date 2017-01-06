<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cxcPagos extends Model
{
    protected $table = 'cxc_pagos';

    protected $dates = ['fecha_pago', 'created_at', 'updated_at'];

    protected $fillable = [

        'fecha_pago',
        'monto',
        'no_comprobante',
        'tipo_pago',
        'status',
        'cxc_apto_id'
    ];


    public static $rules = [
        'fecha_pago'        => 'required',
        'monto'             => 'required',
        'tipo_pago'         => 'required',
        'status'            => 'required',
        'cxc_apto_id'       => 'required'
    ];

    public function cxcApto(){

        return $this->belongsTo('App\Models\CxcApartamentos', 'cxc_apto_id');

    }
}
