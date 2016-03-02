<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Apartamento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Torre;


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
    public function index()
    {
        $apartamentos = Apartamento::orderBy('numero', 'ASC')->paginate(5);
        return view('apartamento.index',compact('apartamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {

        $torres = Torre::all()->lists('nombre','id');

        return view('apartamento.create'
                ,compact(
                'torres'
                )
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::except('_token');

        $apartamento = new Apartamento();


        $apartamento->numero = $input['numero'];


        $apartamento->nivel = $input['nivel'];


        $apartamento->cantidad_banios = $input['cantidad_banios'];


        $apartamento->metros_cuadrados = $input['metros_cuadrados'];


        $apartamento->ambientes = $input['ambientes'];


        $apartamento->dormitorios = $input['dormitorios'];


        $apartamento->marca_v_1 = $input['marca_v_1'];


        $apartamento->modelo_v_1 = $input['modelo_v_1'];


        $apartamento->placa_v_1 = $input['placa_v_1'];


        $apartamento->marca_v_2 = $input['marca_v_2'];


        $apartamento->modelo_v_2 = $input['modelo_v_2'];


        $apartamento->placa_v_2 = $input['placa_v_2'];



        $apartamento->torre_id = $input['torre_id'];


        $apartamento->save();

        return redirect('apartamento');
    }

    /**
     * Display the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Request::ajax())
        {
            return URL::to('apartamento/'.$id);
        }

        $apartamento = Apartamento::findOrfail($id);
        return view('apartamento.show',compact('apartamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Request::ajax())
        {
            return URL::to('apartamento/'. $id . '/edit');
        }


        $torres = Torre::all()->lists('nombre','id');


        $apartamento = Apartamento::findOrfail($id);
        return view('apartamento.edit',compact('apartamento'
                ,
                'torres'
                        )
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Request::except('_token');

        $apartamento = Apartamento::findOrfail($id);

        $apartamento->numero = $input['numero'];

        $apartamento->nivel = $input['nivel'];

        $apartamento->cantidad_banios = $input['cantidad_banios'];

        $apartamento->metros_cuadrados = $input['metros_cuadrados'];

        $apartamento->ambientes = $input['ambientes'];

        $apartamento->dormitorios = $input['dormitorios'];

        $apartamento->marca_v_1 = $input['marca_v_1'];

        $apartamento->modelo_v_1 = $input['modelo_v_1'];

        $apartamento->placa_v_1 = $input['placa_v_1'];

        $apartamento->marca_v_2 = $input['marca_v_2'];

        $apartamento->modelo_v_2 = $input['modelo_v_2'];

        $apartamento->placa_v_2 = $input['placa_v_2'];


        $apartamento->torre_id = $input['torre_id'];


        $apartamento->save();

        return redirect('apartamento');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/apartamento/'. $id . '/delete/');

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
     	$apartamento = Apartamento::findOrfail($id);
     	$apartamento->delete();
        return URL::to('apartamento');
    }

}
