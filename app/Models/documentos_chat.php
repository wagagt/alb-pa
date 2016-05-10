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
    'tipo_doc_id',
    'doc_id'
  ];


  protected $casts = [
    'nombre'       => 'string',
    'tipo_doc_id'  => 'integer',
    'path'         => 'string',
    'doc_id'       => 'integer'
  ];


  public static $rules = [
    'nombre' => 'required',
    'tipo_doc_id' => 'required',
    'doc_id' => 'required'
  ];

public function chat_docts(){
  return $this->hasMany('App\Models\chat_docts');
}

}
