<?php
namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Documento;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;
use App\Tipo_documento;
use App\Torre;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;  
use URL;

//use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class DocumentoController extends Controller {
	public function index(Request $request) {
		$documentos = Documento::search($request->nombre)->orderBy('nombre', 'ASC')->paginate(5);
		//dd($documentos->relations());
		return view('documento.index')->with('documentos', $documentos);
	}
	public function create() {
		$previousUrl    = Url::previous();
		$tipoDocumentos = Tipo_documento::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');// se listan los paises
		$torres         = Torre::orderBy('nombre', 'ASC')->lists('nombre', 'id');
		return view('documento.create')
			->with('tipo_documentos_list', $tipoDocumentos)
			->with('torres_list', $torres)
			->with('previousUrl', $previousUrl);
	}
	public function store(Request $request) {
		$input     = $request->all();
		$documento = new Documento($input);
		$documento->save();
		Flash::success('Documento "'.$documento->nombre.'" ha sido agregado satisfactoriamente.');
		return redirect($input["urlBack"]);
		//->route('documento.index');
	}

	public function show($id) {
		$previousUrl = Url::previous();
		$documento   = Documento::findOrfail($id);
		return view('documento.show')
			->with('documento', $documento)
			->with('previousUrl', $previousUrl);
	}

	public function edit($id, Request $request) {
		$previousUrl          = Url::previous();
		$tipo_documentos_list = Tipo_documento::orderBy('descripcion', 'ASC')->lists('descripcion', 'id');
		$torres               = Torre::orderBy('nombre', 'ASC')->lists('nombre', 'id');
		$documento            = Documento::findOrfail($id);
		return view('documento.edit')
			->with('documento', $documento)
			->with('tipo_documentos_list', $tipo_documentos_list)
			->with('torres_list', $torres)
			->with('previousUrl', $previousUrl);
	}

	public function update(Request $request, $id) {
		$input     = $request->all();
		$documento = Documento::findOrfail($id);
		$documento->fill($request->all());
		$documento->save();
		Flash::warning('El documento "'.$documento->nombre.'" ha sido actualizado con éxito!!..');
		return redirect($input["urlBack"]);
	}

	public function DeleteMsg($id) {
		$msg = Ajaxis::MtDeleting('Warning!!', 'Would you like to remove This?', '/documento/'.$id.'/delete/');
	}

	public function destroy($id) {
		$previousUrl = Url::previous();
		$documento   = Documento::findOrfail($id);
		Flash::error('El Documento "'.$documento->nombre.'" ha sido borrado de forma exitosa');
		return \Redirect::to($previousUrl);
	}
}
