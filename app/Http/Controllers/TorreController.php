<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Torre;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Oficina;


/**
 * Class TorreController
 *
 * @author  The scaffold-interface created at 2016-03-01 02:25:32pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class TorreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $torres = Torre::orderBy('nombre','ASC')->paginate(1);
        return view('torre.index',compact('torres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {

        $oficinas = Oficina::all()->lists('nombre','id');

        return view('torre.create'
                ,compact(
                'oficinas'
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

        $torre = new Torre();


        $torre->nombre = $input['nombre'];


        $torre->direccion = $input['direccion'];


        $torre->niveles = $input['niveles'];


        $torre->telefono = $input['telefono'];



        $torre->oficina_id = $input['oficina_id'];


        $torre->save();

        return redirect('torre');
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
            return URL::to('torre/'.$id);
        }

        $torre = Torre::findOrfail($id);
        return view('torre.show',compact('torre'));
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
            return URL::to('torre/'. $id . '/edit');
        }


        $oficinas = Oficina::all()->lists('nombre','id');


        $torre = Torre::findOrfail($id);
        return view('torre.edit',compact('torre'
                ,
                'oficinas'
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

        $torre = Torre::findOrfail($id);

        $torre->nombre = $input['nombre'];

        $torre->direccion = $input['direccion'];

        $torre->niveles = $input['niveles'];

        $torre->telefono = $input['telefono'];


        $torre->oficina_id = $input['oficina_id'];


        $torre->save();

        return redirect('torre');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/torre/'. $id . '/delete/');

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
     	$torre = Torre::findOrfail($id);
     	$torre->delete();
        return URL::to('torre');
    }

}
