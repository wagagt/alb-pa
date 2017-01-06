<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CxcApartamentos extends Model
{
    protected $table = 'cxc_aptos';

    protected $dates = ['fecha_cobro', 'fecha_vence', 'created_at', 'updated_at'];
    protected $fillable = [
        'monto_mora',
        'fecha_cobro',
        'fecha_vence',
        'status',
        'cxc_id',
        'apto_id'
    ];

    public static $rules = [
        'monto_mora'        => 'required',
        'fecha_cobro'       => 'required',
        'status'            => 'required',
        'cxc_id'            => 'required',
        'apto_id'           => 'required'
    ];

    public function cxcPago(){
        return $this->hasMany('App\Models\cxcPagos','cxc_apto_id','id');
    }


}
