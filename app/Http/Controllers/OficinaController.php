<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\OficinaRequest;
use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Oficina;
use App\Paise;
use URL;



/**
* Class OficinaController
*
* @author  The scaffold-interface created at 2016-03-02 07:49:59pm
* @link  https://github.com/amranidev/scaffold-interfac
*/
class OficinaController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return  \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $oficinas = Oficina::search($request->nombre)->orderBy('nombre', 'ASC')->paginate(5);
    //dd($oficinas);
    return view('oficina.index')->with('oficinas',$oficinas);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return  \Illuminate\Http\Response
  */
  public function create()
  {

    $paises = Paise::orderBy('pais','ASC')->lists('pais','id'); // se listan los paises

    return view('oficina.create')->with('paises',$paises);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param    \Illuminate\Http\Request  $request
  * @return  \Illuminate\Http\Response
  */
  public function store(OficinaRequest $request)
  {
    //$input = Request::except('_token');
    $oficina = new Oficina($request->all());
    $oficina->save();
    Flash::success('Oficina '.$oficina->name.' ha sido agregada satisfactoriamente');
    return redirect()->route('oficina.index');
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

    $paises = Paise::orderBy('pais','ASC')->lists('pais','id');

    $oficina = Oficina::findOrfail($id);
    $oficina->pais;  //traigo el pais relacionado

    return view('oficina.edit')
    ->with('paises', $paises)
    ->with('oficina', $oficina);

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
    $oficina = Oficina::findOrfail($id);
    $oficina->fill($request->all());
    //dd($oficina);
    $oficina->save();
    Flash::warning('La oficina ' .$oficina->nombre.' ha sido actualizada con éxito!!..');

    return redirect()->route('oficina.index');
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param    int  $id
  * @return  \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $oficina = Oficina::findOrfail($id);
    $oficina->delete();
    Flash::error('La oficina '.$oficina->nombre.' ha sido borrada de forma exitosa');
    return redirect()->route('oficina.index');
  }

}
