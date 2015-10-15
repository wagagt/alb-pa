<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientesRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ClientesRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ClientesController extends AppBaseController
{

	/** @var  ClientesRepository */
	private $clientesRepository;

	function __construct(ClientesRepository $clientesRepo)
	{
		$this->clientesRepository = $clientesRepo;
	}

	/**
	 * Display a listing of the Clientes.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->clientesRepository->search($input);

		$clientes = $result[0];

		$attributes = $result[1];

		return view('clientes.index')
		    ->with('clientes', $clientes)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Clientes.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientes.create');
	}

	/**
	 * Store a newly created Clientes in storage.
	 *
	 * @param CreateClientesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientesRequest $request)
	{
        $input = $request->all();

		$clientes = $this->clientesRepository->store($input);

		Flash::message('Clientes saved successfully.');

		return redirect(route('clientes.index'));
	}

	/**
	 * Display the specified Clientes.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$clientes = $this->clientesRepository->findClientesById($id);

		if(empty($clientes))
		{
			Flash::error('Clientes not found');
			return redirect(route('clientes.index'));
		}

		return view('clientes.show')->with('clientes', $clientes);
	}

	/**
	 * Show the form for editing the specified Clientes.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clientes = $this->clientesRepository->findClientesById($id);

		if(empty($clientes))
		{
			Flash::error('Clientes not found');
			return redirect(route('clientes.index'));
		}

		return view('clientes.edit')->with('clientes', $clientes);
	}

	/**
	 * Update the specified Clientes in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientesRequest $request)
	{
		$clientes = $this->clientesRepository->findClientesById($id);

		if(empty($clientes))
		{
			Flash::error('Clientes not found');
			return redirect(route('clientes.index'));
		}

		$clientes = $this->clientesRepository->update($clientes, $request->all());

		Flash::message('Clientes updated successfully.');

		return redirect(route('clientes.index'));
	}

	/**
	 * Remove the specified Clientes from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$clientes = $this->clientesRepository->findClientesById($id);

		if(empty($clientes))
		{
			Flash::error('Clientes not found');
			return redirect(route('clientes.index'));
		}

		$clientes->delete();

		Flash::message('Clientes deleted successfully.');

		return redirect(route('clientes.index'));
	}

}
