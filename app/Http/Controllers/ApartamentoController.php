<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ApartamentoRequest;
use App\Http\Controllers\Controller;
use App\Apartamento;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use URL;
use App\Torre;
use App\User;


/**
* Class ApartamentoController
*
* @author  The scaffold-interface created at 2016-03-02 08:11:48pm
* @link  https://github.com/amranidev/scaffold-interfac
*/
class ApartamentoController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return  \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $apartamentos = Apartamento::search($request->apartamento)->orderBy('numero', 'ASC')->paginate(5);
    return view('apartamento.index')->with('apartamentos', $apartamentos);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return  \Illuminate\Http\Response
  */
  public function create()
  {

    $torres = Torre::orderBy('nombre', 'ASC')->lists('nombre','id'); // Lista de torres
    $users = User::orderBy('name', 'ASC')->lists('name','id'); // Lista de torres

    return view('apartamento.create')
    ->with('torres',$torres)
    ->with('users', $users);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param    \Illuminate\Http\Request  $request
  * @return  \Illuminate\Http\Response
  */
  public function store(ApartamentoRequest $request)
  {


    $apartamento = new Apartamento($request->all());
    $apartamento->save();
    Flash::success('El apartamento '.$apartamento->numero.' ha sido agregada satisfactoriamente');
    return redirect()->route('apartamento.index');
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
  public function edit($id)
  {

    $torres = Torre::orderBy('nombre','ASC')->lists('nombre','id');
    $users = User::orderBy('name','ASC')->lists('name','id');
    $apartamento = Apartamento::findOrfail($id);
    $apartamento->torre_id;
    $apartamento->user_id;

    //dd($apartamento->torre->nombre);

    return view('apartamento.edit')
    ->with('torres', $torres)
    ->with('apartamento', $apartamento)
    ->with('users', $users);
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
  $apartamento = Apartamento::findOrfail($id);
  $apartamento->fill($request->all());
    //dd($apartamento);
  $apartamento->save();

  Flash::warning('El apartamento <strong>' .$apartamento->numero.'</strong> ha sido actualizada con éxito!!..');
  return redirect()->route('apartamento.index');
}


/**
* Remove the specified resource from storage.
*
* @param    int  $id
* @return  \Illuminate\Http\Response
*/
public function destroy($id)
{
  $apartamento = Apartamento::findOrfail($id);
  Flash::error('Los apartamentos no pueden ser borrados!!');
  return redirect()->route('apartamento.index');
}

public function aptoTorres(Request $request,$id)
{
  $apartamentos = Apartamento::search($request->apartamento)->where('torre_id', '=', $id)->orderBy('numero', 'ASC')->paginate(5);

  //dd($apartamentos);
  return view('apartamento.index')->with('apartamentos', $apartamentos);

}

}
