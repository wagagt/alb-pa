<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsersRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\RolesRepository;
use App\Libraries\Repositories\UsersRepository;
use App\Libraries\Repositories\ClientesRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class UsersController extends AppBaseController
{

	/** @var  UsersRepository */
	private $UsersRepository;
	private $RolesRepository;
	private $ClientesRepository;

	function __construct(UsersRepository $usersRepo, RolesRepository $rolesRepo, ClientesRepository $clientesRepo)
	{
		$this->usersRepository = $usersRepo;
		$this->rolesRepository = $rolesRepo;
		$this->clientesRepository = $clientesRepo;
	}

	/**
	 * Display a listing of the users.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->usersRepository->search($input);

		$users = $result[0];
		
		$attributes = $result[1];

		return view('users.index')
		    ->with('users', $users)
		    ->with('attributes', $attributes);
	}

	/**
	 * Show the form for creating a new Users.
	 *
	 * @return Response
	 */
	public function create()
	{
				
		/*Add selectS options*/
		$roles_options 		= $this->rolesRepository->optionList();
		$clientes_options 	= $this->clientesRepository->optionList();

		return view('users.create')
		->with('rol_options', $roles_options)
		->with('cliente_options', $clientes_options);
	}

	/**
	 * Store a newly created Users in storage.
	 *
	 * @param CreateUsersRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsersRequest $request)
	{
        $input = $request->all();

		$Users = $this->usersRepository->store($input);

		Flash::message('Users saved successfully.');

		return redirect(route('users.index'));
	}

	/**
	 * Display the specified users.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$Users = $this->usersRepository->findUsersById($id);

		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}

		return view('users.show')->with('Users', $Users);
	}

	/**
	 * Show the form for editing the specified users.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Users = $this->usersRepository->findUsersById($id);
		/*Add selectS options*/
		$roles_options 		= $this->rolesRepository->optionList();
		$clientes_options 	= $this->clientesRepository->optionList();
		
		//dd([$Users,$roles_options,$clientes_options, $Users->id]);exit();

		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}

		return view('users.edit')
		->with('userdata', $Users)
		->with('rol_options', $roles_options)
		->with('cliente_options', $clientes_options);
	}

	/**
	 * Update the specified Users in storage.
	 *
	 * @param  int    $id
	 * @param CreateUsersRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateUsersRequest $request)
	{
		$Users = $this->usersRepository->findUsersById($id);

		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}

		$Users = $this->usersRepository->update($Users, $request->all());

		Flash::message('Users updated successfully.');

		return redirect(route('users.index'));
	}

	/**
	 * Remove the specified Users from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$Users = $this->usersRepository->findUsersById($id);

		if(empty($Users))
		{
			Flash::error('Users not found');
			return redirect(route('users.index'));
		}

		$Users->delete();

		Flash::message('Users deleted successfully.');

		return redirect(route('users.index'));
	}

}
