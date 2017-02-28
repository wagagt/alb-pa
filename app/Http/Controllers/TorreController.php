<?php
namespace App\Http\Controllers;

use App\Http\Requests\TorreRequest;
use App\Documento;
use App\Oficina;
use App\Torre;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TorreController extends Controller {

	public function index(Request $request) {
		$torres = Torre::search($request->nombre)->orderBy('nombre', 'ASC')->paginate(15);
		return view('torre.index')->with('torres', $torres);
	}

	public function create() {

		$oficinas = Oficina::orderBy('nombre', 'ASC')->lists('nombre', 'id');

		return view('torre.create')->with('oficinas', $oficinas);
	}

	public function store(TorreRequest $request) {

		$torre = new Torre($request->all());
		$torre->save();
		Flash::success('Edificio '.$torre->name.' ha sido agregado satisfactoriamente');
		return redirect()->route('torre.index');
	}

	public function show($id) {

	}

	public function edit($id) {
		$oficinas = Oficina::orderBy('nombre', 'ASC')->lists('nombre', 'id');
		$torre = Torre::findOrfail($id);
		$torre->oficina;

		return view('torre.edit')
			->with('oficinas', $oficinas)
			->with('torre', $torre);
	}

	public function update(Request $request, $id) {
		$torre = Torre::findOrfail($id);
		$torre->fill($request->all());
		$torre->save();
		Flash::warning('El edificio '.$torre->nombre.' ha sido actualizado con éxito!!..');

		return redirect()->route('torre.index');
	}

	public function destroy($id) {
		$torre = Torre::findOrfail($id);
		$torre->delete();
		Flash::error('el edificio '.$torre->nombre.' ha sido borrado de forma exitosa');
		return redirect()->route('torre.index');
	}
	
	public function documento(Request $request, $id,$tipo)
	{
		$trim1 = Documento::where('torre_id', '=', $id)
			->where('tipo_documentos_id','=',$tipo)
			->whereMonth('fecha_del', '>=', '1')
			->whereMonth('fecha_del', '<=', '3')
			->orderBy('nombre', 'ASC')->paginate(25);

		$trim2 = Documento::where('torre_id', '=', $id)
			->where('tipo_documentos_id','=',$tipo)
			->whereMonth('fecha_del', '>=', '4')
			->whereMonth('fecha_del', '<=', '6')
			->orderBy('nombre', 'ASC')->paginate(25);

		$trim3 = Documento::where('torre_id', '=', $id)
			->where('tipo_documentos_id','=',$tipo)
			->whereMonth('fecha_del', '>=', '7')
			->whereMonth('fecha_del', '<=', '9')
			->orderBy('nombre', 'ASC')->paginate(25);

		$trim4 = Documento::where('torre_id', '=', $id)
			->where('tipo_documentos_id','=',$tipo)
			->whereMonth('fecha_del', '>=', '10')
			->whereMonth('fecha_del', '<=', '12')
			->orderBy('nombre', 'ASC')->paginate(25);

		$torre = Torre::findOrfail($id);
		$typeOfUser = (\Auth::user()->isAdmin()) ? "" : "propietario.";
		//return view($typeOfUser.'.profile', array('user'=> \Auth::user()));
		return view($typeOfUser.'documento.index')
			->with('trim1', $trim1)
			->with('trim2', $trim2)
			->with('trim3', $trim3)
			->with('trim4', $trim4)
			->with('torre', $torre);
	}

	public function documentos(Request $request, $id)
	{
		$trim1 = Documento::where('torre_id', '=', $id)
			->whereMonth('fecha_del', '>=', '1')
			->whereMonth('fecha_del', '<=', '3')
			->orderBy('nombre', 'ASC')->paginate(25);

		$trim2 = Documento::where('torre_id', '=', $id)
			->whereMonth('fecha_del', '>=', '4')
			->whereMonth('fecha_del', '<=', '6')
			->orderBy('nombre', 'ASC')->paginate(25);

		$trim3 = Documento::where('torre_id', '=', $id)
			->whereMonth('fecha_del', '>=', '7')
			->whereMonth('fecha_del', '<=', '9')
			->orderBy('nombre', 'ASC')->paginate(25);

		$trim4 = Documento::where('torre_id', '=', $id)
			->whereMonth('fecha_del', '>=', '10')
			->whereMonth('fecha_del', '<=', '12')
			->orderBy('nombre', 'ASC')->paginate(25);

		$torre = Torre::findOrfail($id);
		$typeOfUser = (\Auth::user()->isAdmin()) ? "" : "propietario.";
		//return view($typeOfUser.'.profile', array('user'=> \Auth::user()));
		return view($typeOfUser.'documento.index')
			->with('trim1', $trim1)
			->with('trim2', $trim2)
			->with('trim3', $trim3)
			->with('trim4', $trim4)
			->with('torre', $torre);
	}
}
