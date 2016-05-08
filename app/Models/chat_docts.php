<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="chat_docts",
 *      required={texto, documento_id, status_id, user_send_id, user_recibe_id, doc_chat_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="texto",
 *          description="texto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="documento_id",
 *          description="documento_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="status_id",
 *          description="status_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_send_id",
 *          description="user_send_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_recibe_id",
 *          description="user_recibe_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="doc_chat_id",
 *          description="doc_chat_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class chat_docts extends Model
{
    use SoftDeletes;

    public $table = 'chat_docts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'texto',
        'documento_id',
        'status_id',
        'user_send_id',
        'user_recibe_id',
        'doc_chat_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'texto' => 'string',
        'documento_id' => 'integer',
        'status_id' => 'integer',
        'user_send_id' => 'integer',
        'user_recibe_id' => 'integer',
        'doc_chat_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'texto' => 'required',
        'documento_id' => 'required',
        'status_id' => 'required',
        'user_send_id' => 'required',
        'user_recibe_id' => 'required',
        'doc_chat_id' => 'required'
    ];
}
