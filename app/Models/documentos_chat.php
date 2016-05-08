<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="documentos_chat",
 *      required={nombre, tipo_doc_id, doc_id},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tipo_doc_id",
 *          description="tipo_doc_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="path",
 *          description="path",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="archivo",
 *          description="archivo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="doc_id",
 *          description="doc_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class documentos_chat extends Model
{
    use SoftDeletes;

    public $table = 'documentos_chats';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'path',
        'archivo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'tipo_doc_id' => 'integer',
        'path' => 'string',
        'doc_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'tipo_doc_id' => 'required',
        'doc_id' => 'required'
    ];
}
