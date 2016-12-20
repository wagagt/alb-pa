<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// File upload in to chat

class documentos_chat extends Model
{
  use SoftDeletes;

  public $table = 'documentos_chats';


  protected $dates = ['deleted_at'];


  public $fillable = [
    'nombre',
    'path',
    'archivo',
    'doc_id',
    'chat_id'
  ];


  protected $casts = [
    'nombre'       => 'string',
    'path'         => 'string',
    'archivo'      => 'string',
    'doc_id'       => 'integer',
    'chat_id'      => 'integer'
  ];


  public static $rules = [
    'nombre' => 'required',
    'path'         => 'required',
    'archivo'      => 'required',
    'doc_id'       => 'required',
    'chat_id'      => 'required'
  ];

  public function chat_docts(){
    return $this->belongsTo('App\Models\chat_docts', 'chat_id');
  }

public function documentos(){
  return $this->belongsTo('App\Models\documento', 'doc_id');
}

}
