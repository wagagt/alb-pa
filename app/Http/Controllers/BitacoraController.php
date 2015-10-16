<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateBitacoraRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\BitacoraRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class BitacoraController extends AppBaseController
{

	/** @var  BitacoraRepository */
	private $bitacoraRepository;

	function __construct(BitacoraRepository $bitacoraRepo)
	{
		// $this->middleware('auth'); Validar que solo usuarios autenticados puedan usar el controlador
		$this->bitacoraRepository = $bitacoraRepo;
	}

	/**
	 * Display a listing of the Bitacora.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->bitacoraRepository->search($input);

		$bitacoras = $result[0];

		$attributes = $result[1];

		return view('bitacoras.index')
		    ->with('bitacoras', $bitacoras)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Bitacora.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('bitacoras.create');
	}

	/**
	 * Store a newly created Bitacora in storage.
	 *
	 * @param CreateBitacoraRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateBitacoraRequest $request)
	{
        $input = $request->all();

		$bitacora = $this->bitacoraRepository->store($input);

		Flash::message('Bitacora saved successfully.');

		return redirect(route('bitacoras.index'));
	}

	/**
	 * Display the specified Bitacora.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$bitacora = $this->bitacoraRepository->findBitacoraById($id);

		if(empty($bitacora))
		{
			Flash::error('Bitacora not found');
			return redirect(route('bitacoras.index'));
		}

		return view('bitacoras.show')->with('bitacora', $bitacora);
	}

	/**
	 * Show the form for editing the specified Bitacora.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bitacora = $this->bitacoraRepository->findBitacoraById($id);

		if(empty($bitacora))
		{
			Flash::error('Bitacora not found');
			return redirect(route('bitacoras.index'));
		}

		return view('bitacoras.edit')->with('bitacora', $bitacora);
	}

	/**
	 * Update the specified Bitacora in storage.
	 *
	 * @param  int    $id
	 * @param CreateBitacoraRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateBitacoraRequest $request)
	{
		$bitacora = $this->bitacoraRepository->findBitacoraById($id);

		if(empty($bitacora))
		{
			Flash::error('Bitacora not found');
			return redirect(route('bitacoras.index'));
		}

		$bitacora = $this->bitacoraRepository->update($bitacora, $request->all());

		Flash::message('Bitacora updated successfully.');

		return redirect(route('bitacoras.index'));
	}

	/**
	 * Remove the specified Bitacora from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$bitacora = $this->bitacoraRepository->findBitacoraById($id);

		if(empty($bitacora))
		{
			Flash::error('Bitacora not found');
			return redirect(route('bitacoras.index'));
		}

		$bitacora->delete();

		Flash::message('Bitacora deleted successfully.');

		return redirect(route('bitacoras.index'));
	}

}
