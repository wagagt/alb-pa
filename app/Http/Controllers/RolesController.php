<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRolesRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\RolesRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class RolesController extends AppBaseController
{

	/** @var  RolesRepository */
	private $rolesRepository;

	function __construct(RolesRepository $rolesRepo)
	{
		$this->rolesRepository = $rolesRepo;
	}

	/**
	 * Display a listing of the Roles.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $input = $request->all();

		$result = $this->rolesRepository->search($input);

		$roles = $result[0];

		$attributes = $result[1];

		return view('roles.index')
		    ->with('roles', $roles)
		    ->with('attributes', $attributes);;
	}

	/**
	 * Show the form for creating a new Roles.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('roles.create');
	}

	/**
	 * Store a newly created Roles in storage.
	 *
	 * @param CreateRolesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRolesRequest $request)
	{
        $input = $request->all();

		$roles = $this->rolesRepository->store($input);

		Flash::message('Roles saved successfully.');

		return redirect(route('roles.index'));
	}

	/**
	 * Display the specified Roles.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$roles = $this->rolesRepository->findRolesById($id);

		if(empty($roles))
		{
			Flash::error('Roles not found');
			return redirect(route('roles.index'));
		}

		return view('roles.show')->with('roles', $roles);
	}

	/**
	 * Show the form for editing the specified Roles.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$roles = $this->rolesRepository->findRolesById($id);

		if(empty($roles))
		{
			Flash::error('Roles not found');
			return redirect(route('roles.index'));
		}

		return view('roles.edit')->with('roles', $roles);
	}

	/**
	 * Update the specified Roles in storage.
	 *
	 * @param  int    $id
	 * @param CreateRolesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateRolesRequest $request)
	{
		$roles = $this->rolesRepository->findRolesById($id);

		if(empty($roles))
		{
			Flash::error('Roles not found');
			return redirect(route('roles.index'));
		}

		$roles = $this->rolesRepository->update($roles, $request->all());

		Flash::message('Roles updated successfully.');

		return redirect(route('roles.index'));
	}

	/**
	 * Remove the specified Roles from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$roles = $this->rolesRepository->findRolesById($id);

		if(empty($roles))
		{
			Flash::error('Roles not found');
			return redirect(route('roles.index'));
		}

		$roles->delete();

		Flash::message('Roles deleted successfully.');

		return redirect(route('roles.index'));
	}

}
