<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Oficina;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Paise;


/**
 * Class OficinaController
 *
 * @author  The scaffold-interface created at 2016-03-01 07:10:33am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Oficina::all();
        return view('oficina.index',compact('oficinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        $paises = Paise::all()->lists('nombre','id');
        
        return view('oficina.create'
                ,compact(
                'paises'
                )
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');

        $oficina = new Oficina();

        
        $oficina->nombre = $input['nombre'];

        
        $oficina->direccion = $input['direccion'];

        
        $oficina->telefono = $input['telefono'];

        
        
        $oficina->paise_id = $input['paise_id'];

        
        $oficina->save();

        return redirect('oficina');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('oficina/'.$id);
        }

        $oficina = Oficina::findOrfail($id);
        return view('oficina.show',compact('oficina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Request::ajax())
        {
            return URL::to('oficina/'. $id . '/edit');
        }

        
        $paises = Paise::all()->lists('nombre','id');

        
        $oficina = Oficina::findOrfail($id);
        return view('oficina.edit',compact('oficina'
                ,
                'paises'
                        )
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        $oficina = Oficina::findOrfail($id);
    	
        $oficina->nombre = $input['nombre'];
        
        $oficina->direccion = $input['direccion'];
        
        $oficina->telefono = $input['telefono'];
        
        
        $oficina->paise_id = $input['paise_id'];

        
        $oficina->save();

        return redirect('oficina');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     *
     * @return  String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/oficina/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$oficina = Oficina::findOrfail($id);
     	$oficina->delete();
        return URL::to('oficina');
    }

}
