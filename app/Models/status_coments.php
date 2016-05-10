<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="status_coments",
 *      required={tipo},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="string"
 *      )
 * )
 */
class status_coments extends Model
{
    use SoftDeletes;

    public $table = 'status_coments';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required'
    ];

    public function chat_docts(){
      return $this->hasMany('App\Models\chat_docts');
    }
}
