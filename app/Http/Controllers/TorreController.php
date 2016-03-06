<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TorreRequest;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Torre;
use URL;

use App\Oficina;


/**
* Class TorreController
*
* @author  The scaffold-interface created at 2016-03-02 08:02:48pm
* @link  https://github.com/amranidev/scaffold-interfac
*/
class TorreController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return  \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $torres = Torre::search($request->nombre)->orderBy('nombre','ASC')->paginate(15);
    //dd($torres);
    return view('torre.index')->with('torres', $torres);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return  \Illuminate\Http\Response
  */
  public function create()
  {

    $oficinas = Oficina::orderBy('nombre','ASC')->lists('nombre','id');

    return view('torre.create')->with('oficinas', $oficinas);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param    \Illuminate\Http\Request  $request
  * @return  \Illuminate\Http\Response
  */
  public function store(TorreRequest $request)
  {

    $torre = new Torre($request->all());
    $torre->save();
    Flash::success('torre '.$torre->name.' ha sido agregada satisfactoriamente');
    return redirect()->route('torre.index');
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
    $oficinas = Oficina::orderBy('nombre','ASC')->lists('nombre','id');

    $torre = Torre::findOrfail($id);
    $torre->oficina;  //traigo la oficina relacionada

    return view('torre.edit')
    ->with('oficinas', $oficinas)
    ->with('torre', $torre);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param    \Illuminate\Http\Request  $request
  * @param    int  $id
  * @return  \Illuminate\Http\Response
  */
  public function update(Request $request,$id)
  {
    $torre = Torre::findOrfail($id);
    $torre->fill($request->all());
    //dd($torre);
    $torre->save();
    Flash::warning('La torre ' .$torre->nombre.' ha sido actualizada con éxito!!..');

    return redirect()->route('torre.index');
  }


  /**
  * Remove the specified resource from storage.
  *
  * @param    int  $id
  * @return  \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $torre = Torre::findOrfail($id);
    $torre->delete();
    Flash::error('La torre '.$torre->nombre.' ha sido borrada de forma exitosa');
    return redirect()->route('torre.index');
  }

}
