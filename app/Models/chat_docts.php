<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class chat_docts extends Model
{
    use SoftDeletes;

    public $table = 'chat_docts';
    protected $with = array('user_send');
    protected $dates = ['deleted_at'];

    public $fillable = [
        'texto', 'documento_id', 'status_id', 'user_send_id', 'user_recibe_id', 'doc_chat_id', 'mensaje_tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'texto'            => 'string',
        'documento_id'     => 'integer',
        'status_id'        => 'integer',
        'user_send_id'     => 'integer',
        'user_recibe_id'   => 'integer',
        'doc_chat_id'      => 'integer',
        'mensaje_tipo'     => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'texto'             => 'required',
        'documento_id'      => 'required',
        'status_id'         => 'required',
        'user_send_id'      => 'required',
        'user_recibe_id'    => 'required'

    ];

    public function documento(){
      return $this->belongsTo('App\Documento', 'documento_id');
    }

    public function status(){
      return $this->belongsTo('App\Models\status_coments', 'status_id');
    }

    public function user_send(){
      return $this->belongsTo('App\User', 'user_send_id');
    }

    public function user_receive(){
      return $this->belongsTo('App\User', 'user_recibe_id');
    }

    public function documentos_chat(){
      return $this->hasMany('App\Models\documentos_chat');
    }
}
