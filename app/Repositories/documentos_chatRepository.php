<?php

namespace App\Repositories;

use App\Models\documentos_chat;
use InfyOm\Generator\Common\BaseRepository;

class documentos_chatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'tipo_doc_id',
        'doc_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return documentos_chat::class;
    }
}
