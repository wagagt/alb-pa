<?php

namespace App\Repositories;

use App\Models\notificaionesChat;
use InfyOm\Generator\Common\BaseRepository;

class notificaionesChatRepository extends BaseRepository
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
        return notificaionesChat::class;
    }
}
