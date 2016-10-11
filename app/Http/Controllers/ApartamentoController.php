<?php
namespace App\Http\Controllers;

use App\Apartamento;

use App\Http\Controllers\Controller;

use App\Http\Requests\ApartamentoRequest;

use App\Torre;
use App\User;
use DB;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class ApartamentoController
 *
 * @author  The scaffold-interface created at 2016-03-02 08:11:48pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */

class ApartamentoController extends Controller {

	public function index(Request $request) {
		return view('apartamento.index');
	}

	public function create() {

		$torres = Torre::orderBy('nombre', 'ASC')->lists('nombre', 'id');// Lista de torres
		$users  = User::where("status", "=", "1")
			->where("tipo", "=", "propietario")
			->orderBy('name', 'ASC')
			->lists('name', 'id');// Lista de usuarios

		return view('apartamento.create')
			->with('torres', $torres)
			->with('users', $users);
	}

	public function store(ApartamentoRequest $request) {
		$apartamento = new Apartamento($request->all());
		$apartamento->save();
		Flash::success('El apartamento "'.$apartamento->numero.'" ha sido agregada satisfactoriamente');
		return redirect()->route('apartamento.index');
	}

	public function show($id) {

	}

	public function edit($id) {

		$torres   = Torre::orderBy('nombre', 'ASC')->lists('nombre', 'id');
		$users    = User::orderBy('name', 'ASC')->lists('name', 'id');
		$parqueos = DB::table('parqueos')->where('apto_id', '=', $id)->get();
		$autos    = DB::table('automoviles_aptos')->where('apto_id', '=', $id)->get();

		$apartamento = Apartamento::findOrfail($id);
		$apartamento->torre_id;
		$apartamento->user_id;

		return view('apartamento.edit')
			->with('torres', $torres)
			->with('apartamento', $apartamento)
			->with('users', $users)
			->with('parqueos', $parqueos)
			->with('autos', $autos);
	}

	public function update(Request $request, $id) {
		$apartamento = Apartamento::findOrfail($id);
		$apartamento->fill($request->all());

		$apartamento->save();

		Flash::warning('El apartamento <strong>"'.$apartamento->numero.'"</strong> ha sido actualizada con éxito!!..');
		return redirect()->route('apartamento.index');
	}

	public function destroy($id) {
		$apartamento = Apartamento::findOrfail($id);
		Flash::error('Los apartamentos no pueden ser borrados!!');
		return redirect()->route('apartamento.index');
	}

	public function aptoTorres(Request $request, $id) {
		$apartamentos = Apartamento::search($request->apartamento)->where('torre_id', '=', $id)->orderBy('numero', 'ASC')->paginate(25);
		return view('apartamento.index')->with('apartamentos', $apartamentos);

	}


	public function getDataTable(){
		$apartamentos = DB::table('apartamentos')								
								->join('users', 'users.id', '=', 'apartamentos.user_id')
								->join('torres', 'torres.id', '=','apartamentos.torre_id' )
								->select(['apartamentos.id', 'apartamentos.numero', 'apartamentos.nivel', 'metros_cuadrados', 'torres.nombre as torre', 'users.name as propietario']);

		return Datatables::of($apartamentos)
		->addColumn('acciones', function($apartamento){
			return '<a href="apartamento/'.$apartamento->id.'/edit" class="btn btn-warning" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="apartamento/'.$apartamento->id.'/destroy" class="btn btn-danger" title="Elimiar" onclick="return confirm(\'¿Seguro que desea eliminar el registro?\')">
                                      <i class="fa fa-trash"></i></a>';
		})
		->make(true);
	}





}
