<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Tipo_documento;
use URL;

/**
 * Class Tipo_documentoController
 *
 * @author  The scaffold-interface created at 2016-03-12 01:24:24pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Tipo_documentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipo_documentos = Tipo_documento::search($request->tipo_documento)->orderBy('descripcion', 'ASC')->paginate(5);
        return view('tipo_documento.index')->with('tipo_documentos', $tipo_documentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_documento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_documento = new Tipo_documento($request->all());
        $tipo_documento->save();
        Flash::success('Tipo documento "'.$tipo_documento->descripcion.'" ha sido creado con exito!.');
        return redirect()->route('tipo_documento.index');
        // $input = Request::except('_token');
        // $tipo_documento = new Tipo_documento();
        // $tipo_documento->descripcion = $input['descripcion'];
        // $tipo_documento->save();
        // return redirect('tipo_documento');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(Request::ajax())
        // {
        //     return URL::to('tipo_documento/'.$id);
        // }

        // $tipo_documento = Tipo_documento::findOrfail($id);
        // return view('tipo_documento.show',compact('tipo_documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(Request::ajax())
        // {
        //     return URL::to('tipo_documento/'. $id . '/edit');
        // }
        $tipo_documento = Tipo_documento::findOrfail($id);
        return view('tipo_documento.edit',compact('tipo_documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$input = Request::except('_token');
        $tipo_documento = Tipo_documento::findOrfail($id);
        $tipo_documento->fill($request->all());
        $tipo_documento->save();
        //return redirect('tipo_documento');
        Flash::warning('El tipo documento "'.$tipo_documento->descripcion.'" ha sido actualizado con éxito!!');
        return redirect()->route('tipo_documento.index');
    }

    public function DeleteMsg($id)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/tipo_documento/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    public function destroy($id)
    {
     	$tipo_documento = Tipo_documento::findOrfail($id);
     	$tipo_documento->delete();
        //return URL::to('tipo_documento');
        Flash::error('El tipo documento  "'.$tipo_documento->descripcion. '" ha sido borrado de forma exitosa!!');
        return redirect()->route('tipo_documento.index');
    }

}
