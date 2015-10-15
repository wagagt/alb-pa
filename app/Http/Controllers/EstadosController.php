<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEstadosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\EstadosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class EstadosController extends AppBaseController
{

	/** @var  EstadosRepository */
	private $estadosRepository;

	function __construct(EstadosRepository $estadosRepo)
	{
		$this->estadosRepository = $estadosRepo;
	}

	/**
	 * Display a listing of the Estados.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->estadosRepository->search($input);

		$estados = $result[0];

		$attributes = $result[1];

		return view('estados.index')
		    ->with('estados', $estados)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Estados.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('estados.create');
	}

	/**
	 * Store a newly created Estados in storage.
	 *
	 * @param CreateEstadosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEstadosRequest $request)
	{
        $input = $request->all();

		$estados = $this->estadosRepository->store($input);

		Flash::message('Estados saved successfully.');

		return redirect(route('estados.index'));
	}

	/**
	 * Display the specified Estados.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$estados = $this->estadosRepository->findEstadosById($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');
			return redirect(route('estados.index'));
		}

		return view('estados.show')->with('estados', $estados);
	}

	/**
	 * Show the form for editing the specified Estados.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$estados = $this->estadosRepository->findEstadosById($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');
			return redirect(route('estados.index'));
		}

		return view('estados.edit')->with('estados', $estados);
	}

	/**
	 * Update the specified Estados in storage.
	 *
	 * @param  int    $id
	 * @param CreateEstadosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateEstadosRequest $request)
	{
		$estados = $this->estadosRepository->findEstadosById($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');
			return redirect(route('estados.index'));
		}

		$estados = $this->estadosRepository->update($estados, $request->all());

		Flash::message('Estados updated successfully.');

		return redirect(route('estados.index'));
	}

	/**
	 * Remove the specified Estados from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$estados = $this->estadosRepository->findEstadosById($id);

		if(empty($estados))
		{
			Flash::error('Estados not found');
			return redirect(route('estados.index'));
		}

		$estados->delete();

		Flash::message('Estados deleted successfully.');

		return redirect(route('estados.index'));
	}

}
