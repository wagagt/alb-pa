<?php

namespace App\Subscriber;
use App\Libraries\Repositories\BitacoraRepository;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Schema;

class Auth
{
    
    private $bitacoraRepository;
    
    function __construct(BitacoraRepository $bitacoraRepo)
	{
		$this->bitacoraRepository = $bitacoraRepo;
	}
	

    public function onLogin($user)
    {
         $bitacora =  [
        'id_usuario' => $user->id,
        'accion' => 'user-logedin',
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
        ];
        
        //Bitacora::create($bitacora);
        //$this->bitacoraRepository->store($bitacora);
        //route('App\Http\Controllers\BitacoraController@store',$bitacora);
        //dd($bitacora);
    
        \DB::table('bitacoras')->insert($bitacora);
        
    }
    
    public function subscribe($events)
    {
        $events->listen('auth.getLogin', 'App\Subscriber\Auth@onLogin');
    }
    
}