<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DocumentoRequest;
use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Documento;
use App\Torre;
use App\Tipo_documento;
use URL;

/**
 * Class DocumentoController
 *
 * @author  The scaffold-interface created at 2016-03-12 06:04:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class DocumentoController extends Controller
{

    public function index(Request $request)
    {
        $documentos = Documento::search($request->nombre)->orderBy('nombre', 'ASC')->paginate(5);
        //dd($documentos->relations());
        return view('documento.index')->with('documentos', $documentos);
    }

    public function create()
    {
        $tipoDocumentos = Tipo_documento::orderBy('descripcion','ASC')->lists('descripcion','id'); // se listan los paises
        $torres = Torre::orderBy('nombre','ASC')->lists('nombre','id');
        return view('documento.create')
        ->with('tipo_documentos_list', $tipoDocumentos)
        ->with('torres_list', $torres);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $documento = new Documento($input);
        $documento->save();
        Flash::success('Documento "'.$documento->nombre. '" ha sido agregado satisfactoriamente.');
        return redirect()->route('documento.index');
    }

    public function show($id)
    {
        $documento = Documento::findOrfail($id);
        return view('documento.show',compact('documento'));
    }

    public function edit($id)
    {
        $tipo_documentos_list = Tipo_documento::orderBy('descripcion','ASC')->lists('descripcion','id'); 
        $torres = Torre::orderBy('nombre','ASC')->lists('nombre','id');
        $documento = Documento::findOrfail($id);
        return view('documento.edit')
        ->with('documento', $documento)
        ->with('tipo_documentos_list', $tipo_documentos_list)
        ->with('torres_list', $torres);
    }

    public function update(Request $request, $id)
    {
        $documento = Documento::findOrfail($id);
        $documento->fill($request->all());
        $documento->save();
        Flash::warning('El documento "' .$documento->nombre.'" ha sido actualizado con éxito!!..');
        return redirect()->route('documento.index');
    }

    public function DeleteMsg($id)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/documento/'. $id . '/delete/');
    }

    public function destroy($id)
    {
     	$documento = Documento::findOrfail($id);
     	$documento->delete();
        Flash::error('El Documento "'.$documento->nombre.'" ha sido borrado de forma exitosa');
        return redirect()->route('documento.index');
    }

}
