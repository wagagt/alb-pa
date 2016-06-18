<?php
namespace App\Http\Controllers;

use Amranidev\Ajaxis\Ajaxis;
use App\Archivos_documento;
use App\Documento;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Flash;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Models\chat_docts;
use URL;

class Archivos_documentoController extends Controller {

	public function index() {
		$archivos_documentos = Archivos_documento::all();
		return view('archivos_documento.index', compact('archivos_documentos'));
	}

	public function archivosxDocumento($id) {
		$documento          = Documento::with('Tipo_documento', 'Torre')->where('id', $id)->first();
		$archivos_documento = \DB::table('archivos_documentos')->where('documentos_id', $id)->get();
		$usuarios = User::orderBy('usuario', 'ASC')->get();

		$senderActive = \DB::table('chat_docts')->distinct()->select('user_send_id')->where('documento_id', $id); 
		$receiverActive = \DB::table('chat_docts')->distinct()->select('user_recibe_id')->where('documento_id', $id); 
		$usersChatActive = $senderActive->union($receiverActive)->get();
		//dd($usersChatActive);
		$chats = [];
		return view('archivos_documento.index')
			->with('documento', $documento)
			->with('archivos', $archivos_documento)
			->with('usuarios', $usuarios)
			->with('usersChatActive', $usersChatActive)
			->with('chats', $chats);

	}

	public function PropArchivosxDocumento($id) {
	 
	 $documento= Documento::with('Tipo_documento', 'Torre')
	 ->where('id', $id)
	 ->first();

	 $archivos_documento = \DB::table('archivos_documentos')
	 ->where('documentos_id', $id)
	 ->where('activo', '1')
	 ->get();
	 
	  $usuarios = User::where('tipo', 'admin')
	  ->orderBy('usuario', 'ASC')->get();
	 
	 $chats = [];
	 return view('propietario.archivos_documento.index')
	 	->with('documento', $documento)
	 	->with('archivos', $archivos_documento)
	 	->with('usuarios', $usuarios)
	 	->with('chats', $chats);
	}

	

	public function create() {
		$previousUrl = Url::previous();
		return view('archivos_documento.create')
			->with('previousUrl', $previousUrl);
	}

	public function store(Request $request) {
		$input = $request->all();
		if (isset($input['archivo'])) {
			$file = $input['archivo'];
			$file = $request->file('archivo');
			$extension       = $file->getClientOriginalExtension();
			$fileName        = $file->getClientOriginalName();
			
			$archivos_documento                = new Archivos_documento();
			$archivos_documento->nombre        = $file->getClientOriginalName();
			$archivos_documento->tipo          = $file->getClientOriginalExtension();
			$archivos_documento->activo        = '0';
			$archivos_documento->documentos_id = $input['documento_id'];
			$archivos_documento->save();
			
			$destinationPath = 'uploads';
			$file->move($destinationPath, $fileName);
			\Flash::success('Archivo subido exitosamente.');
		} else {
			\Flash::error('Seleccione un archivo');
		}
		return redirect('documento/'.$input['documento_id'].'/archivos_documento');
	}

	public function show($id) {
		if (Request::ajax()) {
			return URL::to('archivos_documento/'.$id);
		}

		$archivos_documento = Archivos_documento::findOrfail($id);
		return view('archivos_documento.show', compact('archivos_documento'));
	}

	public function edit($id) {
		if (Request::ajax()) {
			return URL::to('archivos_documento/'.$id.'/edit');
		}

		$archivos_documento = Archivos_documento::findOrfail($id);
		return view('archivos_documento.edit', compact('archivos_documento'
			)
		);
	}

	public function update($archivo_id, Request $request) {
		$input        = $request->all();
		$documento_id = $input['documento_id'];
		$affectedRows = Archivos_documento::where('activo', '=', '1')->update(array('activo' => '0'));

		if ($archivo_id > 0) {
			$archivos_documento         = Archivos_documento::findOrfail($archivo_id);
			$archivos_documento->activo = "1";
			$archivos_documento->save();
		}
		return redirect('documento/'.$documento_id.'/archivos_documento');
	}

	public function DeleteMsg($id) {
		$msg = Ajaxis::MtDeleting('Warning!!', 'Would you like to remove This?', '/archivos_documento/'.$id.'/delete/');

		if (Request::ajax()) {
			return $msg;
		}
	}

	public function destroy($id) {
		$archivos_documento = Archivos_documento::findOrfail($id);
		$id_documento       = $archivos_documento->documentos_id;
		$archivos_documento->delete();
		return redirect('documento/'.$id_documento.'/archivos_documento');
	}

	

	
	
}
