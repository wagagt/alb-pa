<?php

namespace App\Repositories;

use App\Models\status_coments;
use InfyOm\Generator\Common\BaseRepository;

class status_comentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return status_coments::class;
    }
}
