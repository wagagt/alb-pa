<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Marca_vehiculo;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Marca_vehiculoController
 *
 * @author  The scaffold-interface created at 2016-04-02 06:37:07pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Marca_vehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $marca_vehiculos = Marca_vehiculo::all();
        return view('marca_vehiculo.index',compact('marca_vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('marca_vehiculo.create'
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

        $marca_vehiculo = new Marca_vehiculo();

        
        $marca_vehiculo->marca = $input['marca'];

        
        
        $marca_vehiculo->save();

        return redirect('marca_vehiculo');
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
            return URL::to('marca_vehiculo/'.$id);
        }

        $marca_vehiculo = Marca_vehiculo::findOrfail($id);
        return view('marca_vehiculo.show',compact('marca_vehiculo'));
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
            return URL::to('marca_vehiculo/'. $id . '/edit');
        }

        
        $marca_vehiculo = Marca_vehiculo::findOrfail($id);
        return view('marca_vehiculo.edit',compact('marca_vehiculo'
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

        $marca_vehiculo = Marca_vehiculo::findOrfail($id);
    	
        $marca_vehiculo->marca = $input['marca'];
        
        
        $marca_vehiculo->save();

        return redirect('marca_vehiculo');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/marca_vehiculo/'. $id . '/delete/');

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
     	$marca_vehiculo = Marca_vehiculo::findOrfail($id);
     	$marca_vehiculo->delete();
        return URL::to('marca_vehiculo');
    }

}
