<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentoRequest;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Documento;
use URL;

/**
 * Class DocumentoController
 *
 * @author  The scaffold-interface created at 2016-03-12 06:04:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd('documentoController index');
        //dd($request->nombre);
        $documentos = Documento::search($request->nombre)->orderBy('nombre', 'ASC')->paginate(5);
        //dd($documentos);
        return view('documento.index')->with('documentos', $documentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_documento = tipo_documento::orderBy('nombre','ASC')->lists('nombre', 'id');
        return view('documento.create')->with('tipo_documento', $tipo_documento);
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
        $documento = new Documento($input);
        $documento->save();
        Flash::success('Documento '.$documento->nombre. 'ha sido agregado satisfactoriamente.');
        return redirect('documento.index');
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
            return URL::to('documento/'.$id);
        }

        $documento = Documento::findOrfail($id);
        return view('documento.show',compact('documento'));
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
            return URL::to('documento/'. $id . '/edit');
        }

        
        $documento = Documento::findOrfail($id);
        return view('documento.edit',compact('documento'
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

        $documento = Documento::findOrfail($id);
    	
        $documento->nombre = $input['nombre'];
        
        $documento->tipo_documentos_id = $input['tipo_documentos_id'];
        
        $documento->fecha_del = $input['fecha_del'];
        
        $documento->fecha_al = $input['fecha_al'];
        
        $documento->user_id = $input['user_id'];
        
        
        $documento->save();

        return redirect('documento');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/documento/'. $id . '/delete/');

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
     	$documento = Documento::findOrfail($id);
     	$documento->delete();
        return URL::to('documento');
    }

}
