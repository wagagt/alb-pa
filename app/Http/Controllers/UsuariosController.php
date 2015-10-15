<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuariosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\UsuariosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class UsuariosController extends AppBaseController
{

	/** @var  UsuariosRepository */
	private $usuariosRepository;

	function __construct(UsuariosRepository $usuariosRepo)
	{
		$this->usuariosRepository = $usuariosRepo;
	}

	/**
	 * Display a listing of the Usuarios.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->usuariosRepository->search($input);

		$usuarios = $result[0];

		$attributes = $result[1];

		return view('usuarios.index')
		    ->with('usuarios', $usuarios)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Usuarios.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarios.create');
	}

	/**
	 * Store a newly created Usuarios in storage.
	 *
	 * @param CreateUsuariosRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsuariosRequest $request)
	{
        $input = $request->all();

		$usuarios = $this->usuariosRepository->store($input);

		Flash::message('Usuarios saved successfully.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Display the specified Usuarios.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuarios = $this->usuariosRepository->findUsuariosById($id);

		if(empty($usuarios))
		{
			Flash::error('Usuarios not found');
			return redirect(route('usuarios.index'));
		}

		return view('usuarios.show')->with('usuarios', $usuarios);
	}

	/**
	 * Show the form for editing the specified Usuarios.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuarios = $this->usuariosRepository->findUsuariosById($id);

		if(empty($usuarios))
		{
			Flash::error('Usuarios not found');
			return redirect(route('usuarios.index'));
		}

		return view('usuarios.edit')->with('usuarios', $usuarios);
	}

	/**
	 * Update the specified Usuarios in storage.
	 *
	 * @param  int    $id
	 * @param CreateUsuariosRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateUsuariosRequest $request)
	{
		$usuarios = $this->usuariosRepository->findUsuariosById($id);

		if(empty($usuarios))
		{
			Flash::error('Usuarios not found');
			return redirect(route('usuarios.index'));
		}

		$usuarios = $this->usuariosRepository->update($usuarios, $request->all());

		Flash::message('Usuarios updated successfully.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Remove the specified Usuarios from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuarios = $this->usuariosRepository->findUsuariosById($id);

		if(empty($usuarios))
		{
			Flash::error('Usuarios not found');
			return redirect(route('usuarios.index'));
		}

		$usuarios->delete();

		Flash::message('Usuarios deleted successfully.');

		return redirect(route('usuarios.index'));
	}

}
