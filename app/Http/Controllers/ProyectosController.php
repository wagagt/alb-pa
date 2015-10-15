<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProyectosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ProyectosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ProyectosController extends AppBaseController
{

	/** @var  ProyectosRepository */
	private $proyectosRepository;

	function __construct(ProyectosRepository $proyectosRepo)
	{
		$this->proyectosRepository = $proyectosRepo;
	}

	/**
	 * Display a listing of the Proyectos.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->proyectosRepository->search($input);

		$proyectos = $result[0];

		$attributes = $result[1];

		return view('proyectos.index')
		    ->with('proyectos', $proyectos)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Proyectos.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('proyectos.create');
	}

	/**
	 * Store a newly created Proyectos in storage.
	 *
	 * @param CreateProyectosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateProyectosRequest $request)
	{
        $input = $request->all();

		$proyectos = $this->proyectosRepository->store($input);

		Flash::message('Proyectos saved successfully.');

		return redirect(route('proyectos.index'));
	}

	/**
	 * Display the specified Proyectos.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$proyectos = $this->proyectosRepository->findProyectosById($id);

		if(empty($proyectos))
		{
			Flash::error('Proyectos not found');
			return redirect(route('proyectos.index'));
		}

		return view('proyectos.show')->with('proyectos', $proyectos);
	}

	/**
	 * Show the form for editing the specified Proyectos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$proyectos = $this->proyectosRepository->findProyectosById($id);

		if(empty($proyectos))
		{
			Flash::error('Proyectos not found');
			return redirect(route('proyectos.index'));
		}

		return view('proyectos.edit')->with('proyectos', $proyectos);
	}

	/**
	 * Update the specified Proyectos in storage.
	 *
	 * @param  int    $id
	 * @param CreateProyectosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateProyectosRequest $request)
	{
		$proyectos = $this->proyectosRepository->findProyectosById($id);

		if(empty($proyectos))
		{
			Flash::error('Proyectos not found');
			return redirect(route('proyectos.index'));
		}

		$proyectos = $this->proyectosRepository->update($proyectos, $request->all());

		Flash::message('Proyectos updated successfully.');

		return redirect(route('proyectos.index'));
	}

	/**
	 * Remove the specified Proyectos from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$proyectos = $this->proyectosRepository->findProyectosById($id);

		if(empty($proyectos))
		{
			Flash::error('Proyectos not found');
			return redirect(route('proyectos.index'));
		}

		$proyectos->delete();

		Flash::message('Proyectos deleted successfully.');

		return redirect(route('proyectos.index'));
	}

}
