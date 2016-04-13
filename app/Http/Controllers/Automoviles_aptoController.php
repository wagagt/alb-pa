<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AutoRequest;
use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Automoviles_apto;
use App\Apartamento;
use App\Marca_vehiculo;
use URL;

/**
 * Class Automoviles_aptoController
 *
 * @author  The scaffold-interface created at 2016-04-03 03:16:17am
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Automoviles_aptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $automoviles_aptos = Automoviles_apto::search($request->placa)->orderBy('apto_id','ASC')->paginate(5);
        return view('automoviles_apto.index')->with('autos',$automoviles_aptos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
          $marcas = Marca_Vehiculo::orderBy('marca', 'ASC')->lists('marca','id');
          $aptos = Apartamento::orderBy('numero', 'ASC')->lists('numero','id');

        return view('automoviles_apto.create')
        ->with('marcas',$marcas)
        ->with('aptos', $aptos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(AutoRequest $request)
    {
        $auto  =  new Automoviles_apto($request->all());
        $auto->save();
        Flash::success('Automóvil matricula # '.$auto->placa.' Ha sido añadido con éxito');
        return redirect()->route('automoviles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    // viene del menu
    public function edit($id)
    {
        $aparta = 0;
        $marcas = Marca_Vehiculo::orderBy('marca', 'ASC')->lists('marca','id');
        $aptos  = Apartamento::orderBy('numero', 'ASC')->lists('numero','id') ;

        $auto = Automoviles_apto::findOrfail($id);
        $auto->apto_id;
        $auto->marca_id;
        return view('automoviles_apto.edit')
        ->with('aptos', $aptos)
        ->with('marcas', $marcas)
        ->with('auto', $auto)
        ->with('apartamento',$aparta);
    }

    //Cuando Viene del edit de apartamentos
    public function edits($id, $apto)
    {
        $aparta = $apto;
        $marcas = Marca_Vehiculo::orderBy('marca', 'ASC')->lists('marca','id');
        $aptos  = Apartamento::orderBy('numero', 'ASC')->lists('numero','id') ;

        $auto = Automoviles_apto::findOrfail($id);
        $auto->apto_id;
        $auto->marca_id;
        return view('automoviles_apto.edit')
        ->with('aptos', $aptos)
        ->with('marcas', $marcas)
        ->with('auto', $auto)
        ->with('apartamento',$aparta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $auto = Automoviles_apto::findOrfail($id);
      $auto->fill($request->all());
      $auto->save();
      if($request->aparta > 0){
        $router = redirect()->route('apartamento.edit',$request->aparta);
      }else{
        $router = redirect()->route('automoviles.index');
      }
      Flash::warning('Las asignacion para el vehículo matricula '.$auto->placa.' se ha realizado con éxito!!.');

      return $router;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $auto = Automoviles_apto::findOrfail($id);
     	Flash::error('Los vehículos no pueden ser borrados solo editados');
      return redirect()->route('automoviles.index');
    }

}
