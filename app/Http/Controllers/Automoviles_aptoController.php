<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Automoviles_apto;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Automoviles_aptoController
 *
 * @author  The scaffold-interface created at 2016-04-03 03:16:17am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Automoviles_aptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $automoviles_aptos = Automoviles_apto::all();
        return view('automoviles_apto.index',compact('automoviles_aptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('automoviles_apto.create'
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

        $automoviles_apto = new Automoviles_apto();

        
        $automoviles_apto->modelo = $input['modelo'];

        
        $automoviles_apto->placa = $input['placa'];

        
        
        $automoviles_apto->save();

        return redirect('automoviles_apto');
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
            return URL::to('automoviles_apto/'.$id);
        }

        $automoviles_apto = Automoviles_apto::findOrfail($id);
        return view('automoviles_apto.show',compact('automoviles_apto'));
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
            return URL::to('automoviles_apto/'. $id . '/edit');
        }

        
        $automoviles_apto = Automoviles_apto::findOrfail($id);
        return view('automoviles_apto.edit',compact('automoviles_apto'
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

        $automoviles_apto = Automoviles_apto::findOrfail($id);
    	
        $automoviles_apto->modelo = $input['modelo'];
        
        $automoviles_apto->placa = $input['placa'];
        
        
        $automoviles_apto->save();

        return redirect('automoviles_apto');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/automoviles_apto/'. $id . '/delete/');

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
     	$automoviles_apto = Automoviles_apto::findOrfail($id);
     	$automoviles_apto->delete();
        return URL::to('automoviles_apto');
    }

}
