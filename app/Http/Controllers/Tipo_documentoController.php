<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Tipo_documento;
use App\Torre;
use URL;

class Tipo_documentoController extends Controller
{
    public function index(Request $request)
    {
        $tipo_documentos = Tipo_documento::search($request->tipo_documento)->orderBy('descripcion', 'ASC')->paginate(10);
        return view('tipo_documento.index')->with('tipo_documentos', $tipo_documentos);
    }

    public function create()
    {
        $torres = Torre::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        return view('tipo_documento.create')->with('torres',$torres);
    }

    public function store(Request $request)
    {
        $tipo_documento = new Tipo_documento($request->all());
        $tipo_documento->save();
        Flash::success('Tipo documento "'.$tipo_documento->descripcion.'" ha sido creado con exito!.');
        return redirect()->route('tipo_documento.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $torres = Torre::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $tipo_documento = Tipo_documento::findOrfail($id);
        $tipo_documento->torre;
        
        return view('tipo_documento.edit')
            ->with('tipo_documento', $tipo_documento)
            ->with('torres', $torres);
    }

    public function update(Request $request, $id)
    {
        $tipo_documento = Tipo_documento::findOrfail($id);
        $tipo_documento->fill($request->all());
        $tipo_documento->save();
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
