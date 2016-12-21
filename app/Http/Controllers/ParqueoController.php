<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParqueoRequest;
use Laracasts\Flash\Flash;
use App\Parqueo;
use App\Apartamento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class ParqueoController
 *
 * @author  The scaffold-interface created at 2016-04-02 07:57:39pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class ParqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parqueos = Parqueo::search($request->numero)->orderBy('numero','ASC')->paginate(15);
        return view('parqueo.index')->with('parqueos', $parqueos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $aptos = Apartamento::orderBy('numero', 'ASC')->lists('numero', 'id');

        return view('parqueo.create')->with('aptos',$aptos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(ParqueoRequest $request)
    {
        $parqueo = new Parqueo($request->all());
        $parqueo->asignado =  1;
        $parqueo->save();
        Flash::success('Parqueo creado'.$parqueo->numero.' y asignado correctamente');

        return redirect()->route('parqueo.index');
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
        $aptos = Apartamento::orderBy('numero','ASC')->lists('numero','id');

        $parqueo = Parqueo::findOrfail($id);
        $parqueo->apto_id;
        return view('parqueo.edit')
            ->with('aptos',$aptos)
            ->with('parqueo', $parqueo);
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
        $parqueo = parqueo::findOrfail($id);
        $parqueo->fill($request->all());
        $parqueo->save();

        Flash::warning('El parqueo '.$parqueo->numero.' ha sido actualizado con éxito');
        return redirect()->route('parqueo.index');
    }

    /**
     * Delete confirmation message by Ajaxis
     *
     * @link  https://github.com/amranidev/ajaxis
     *
     * @return  String
     */
    public function DeleteMsg($id)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/parqueo/'. $id . '/delete/');

        if(Request::ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $parqueo = Parqueo::findOrfail($id);
     	Flash::error('El parqueo '.$parqueo->numero.' no puede ser eliminado');
     	//$parqueo->delete();
        return redirect()->route('parqueo.index');
    }

}
