<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProyectosRequest;
use Illuminate\Http\Request;
use App\Libraries\Repositories\ProyectosRepository;
use App\Libraries\Repositories\ClientesRepository;
use App\Libraries\Repositories\EstadosRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class ProyectosController extends AppBaseController
{

	/** @var  ProyectosRepository */
	private $proyectosRepository;
	private $clientesRepository;
	private $estadosRepository;
	private $maquina_options;
	private $metodo_options;
	

	function __construct(ProyectosRepository $proyectosRepo, EstadosRepository $estadosRepo, ClientesRepository $clientesRepo )
	{
		$this->proyectosRepository 	= $proyectosRepo;
		$this->clientesRepository  	= $clientesRepo;
		$this->estadosRepository  	= $estadosRepo;
		$this->maquina_options		= ['M-3' => 'M-3','M-4' => 'M-4','M-5' => 'M-5','M-6' => 'M-6',
		'M-7' => 'M-7', 'M-8' => 'M-8', 'M-9' => 'M-9', 'M-10' => 'M-10', 'M-11' => 'M-11'];
		$this->metodo_options		= ['Rotativo' => 'Rotativo', 'Percusión' => 'Percusión', 
		'Roto-Percusión' => 'Roto-Percusión'];
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
		/*Add select options*/
		$estados_options 	= $this->estadosRepository->optionList();
		$clientes_options 	= $this->clientesRepository->optionList();
		
		//dd([$this->maquina_options,$this->metodo_options]);
		
		return view('proyectos.create')
		->with('estado_options', $estados_options)
		->with('cliente_options', $clientes_options)
		->with('maquina_options', $this->maquina_options)
		->with('metodo_options', $this->metodo_options);
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
		$proyecto = $this->proyectosRepository->findProyectosById($id);
		//dd($proyecto);
		if(empty($proyecto))
		{
			Flash::error('Proyectos not found');
			return redirect(route('proyectos.index'));
		}
		
		if (\Auth::user()->id_rol == 1 ){  // if is Admin
 			return view('proyectos.show')->with('proyecto', $proyecto);   //Admin view
		}else{
			$proyectos = \DB::table('proyectos')->where('id_cliente',\Auth::user()->id_cliente)->get();
			$comentarios = \DB::table('comentarios')->where('id_proyecto', $id)->orderBy('created_at', 'desc')->get();
			//dd($comentarios);
			return view('proyectos.client-show')
			->with('proyectos',$proyectos)
			->with('proyecto',$proyecto)
			->with('comentarios', $comentarios);
		}
		
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
		/*Add select options*/
		$estados_options 	= $this->estadosRepository->optionList();
		$clientes_options 	= $this->clientesRepository->optionList();

		if(empty($proyectos))
		{
			Flash::error('Proyectos not found');
			return redirect(route('proyectos.index'));
		}

		return view('proyectos.edit')
		->with('proyectos', $proyectos)
		->with('estado_options', $estados_options)
		->with('cliente_options', $clientes_options)
		->with('maquina_options', $this->maquina_options)
		->with('metodo_options', $this->metodo_options);
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
