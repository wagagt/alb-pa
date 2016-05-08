<?php

namespace App\Repositories;

use App\Models\chat_docts;
use InfyOm\Generator\Common\BaseRepository;

class chat_doctsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'texto',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return chat_docts::class;
    }
}
