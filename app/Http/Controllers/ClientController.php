<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ClientRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ClientController extends AppBaseController
{

	/** @var  ClientRepository */
	private $clientRepository;

	function __construct(ClientRepository $clientRepo)
	{
		$this->clientRepository = $clientRepo;
	}

	/**
	 * Display a listing of the Client.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->clientRepository->search($input);

		$clients = $result[0];

		$attributes = $result[1];

		return view('clients.index')
		    ->with('clients', $clients)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Client.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clients.create');
	}

	/**
	 * Store a newly created Client in storage.
	 *
	 * @param CreateClientRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateClientRequest $request)
	{
        $input = $request->all();

		$client = $this->clientRepository->store($input);

		Flash::message('Client saved successfully.');

		return redirect(route('clients.index'));
	}

	/**
	 * Display the specified Client.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$client = $this->clientRepository->findClientById($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		return view('clients.show')->with('client', $client);
	}

	/**
	 * Show the form for editing the specified Client.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = $this->clientRepository->findClientById($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		return view('clients.edit')->with('client', $client);
	}

	/**
	 * Update the specified Client in storage.
	 *
	 * @param  int    $id
	 * @param CreateClientRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateClientRequest $request)
	{
		$client = $this->clientRepository->findClientById($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		$client = $this->clientRepository->update($client, $request->all());

		Flash::message('Client updated successfully.');

		return redirect(route('clients.index'));
	}

	/**
	 * Remove the specified Client from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$client = $this->clientRepository->findClientById($id);

		if(empty($client))
		{
			Flash::error('Client not found');
			return redirect(route('clients.index'));
		}

		$client->delete();

		Flash::message('Client deleted successfully.');

		return redirect(route('clients.index'));
	}

}
