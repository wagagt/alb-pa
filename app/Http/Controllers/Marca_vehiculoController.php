<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarcaVehiculoRequest;
use Laracasts\Flash\Flash;
use App\Marca_vehiculo;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Marca_vehiculoController
 *
 * @author  The scaffold-interface created at 2016-04-02 06:37:07pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Marca_vehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marca_vehiculos = Marca_vehiculo::search($request->marca)->orderBy('marca','ASC')->paginate(15);
        return view('marca_vehiculo.index')
        ->with('marcas', $marca_vehiculos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {

        return view('marca_vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(MarcaVehiculoRequest $request)
    {
      $marcaVehiculo = new Marca_vehiculo($request->all());
      $marcaVehiculo->save();
      Flash::success('La marca '.$marcaVehiculo->marca.' ha sido agregada satisfactoriamente');

        $marcaVehiculo->save();
        return redirect()->route('marca-vehiculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca_vehiculo = Marca_vehiculo::findOrfail($id);
        return view('marca_vehiculo.edit')
                    ->with('marca', $marca_vehiculo);
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
      $marcaVehiculo = Marca_vehiculo::findOrfail($id);
      $marcaVehiculo->fill($request->all());
      //dd($oficina);
      $marcaVehiculo->save();
      Flash::warning('La marca ' .$marcaVehiculo->marca.' ha sido actualizada con éxito!!..');
      return redirect()->route('marca-vehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $marcaVehiculo = Marca_vehiculo::findOrfail($id);
      $marcaVehiculo->delete();
      Flash::error('La marca '.$marcaVehiculo->marca.' ha sido borrada de forma exitosa');
      return redirect()->route('marca-vehiculo.index');

    }

}
