<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Archivos_documento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Archivos_documentoController
 *
 * @author  The scaffold-interface created at 2016-04-09 11:48:37pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Archivos_documentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos_documentos = Archivos_documento::all();
        return view('archivos_documento.index',compact('archivos_documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('archivos_documento.create'
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

        $archivos_documento = new Archivos_documento();

        
        $archivos_documento->id = $input['id'];

        
        $archivos_documento->nombre = $input['nombre'];

        
        $archivos_documento->tipo = $input['tipo'];

        
        $archivos_documento->activo = $input['activo'];

        
        $archivos_documento->documentos_id = $input['documentos_id'];

        
        
        $archivos_documento->save();

        return redirect('archivos_documento');
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
            return URL::to('archivos_documento/'.$id);
        }

        $archivos_documento = Archivos_documento::findOrfail($id);
        return view('archivos_documento.show',compact('archivos_documento'));
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
            return URL::to('archivos_documento/'. $id . '/edit');
        }

        
        $archivos_documento = Archivos_documento::findOrfail($id);
        return view('archivos_documento.edit',compact('archivos_documento'
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

        $archivos_documento = Archivos_documento::findOrfail($id);
    	
        $archivos_documento->id = $input['id'];
        
        $archivos_documento->nombre = $input['nombre'];
        
        $archivos_documento->tipo = $input['tipo'];
        
        $archivos_documento->activo = $input['activo'];
        
        $archivos_documento->documentos_id = $input['documentos_id'];
        
        
        $archivos_documento->save();

        return redirect('archivos_documento');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/archivos_documento/'. $id . '/delete/');

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
     	$archivos_documento = Archivos_documento::findOrfail($id);
     	$archivos_documento->delete();
        return URL::to('archivos_documento');
    }

}
