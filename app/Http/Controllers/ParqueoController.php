<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Parqueo;
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
    public function index()
    {
        $parqueos = Parqueo::all();
        return view('parqueo.index',compact('parqueos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('parqueo.create'
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

        $parqueo = new Parqueo();

        
        $parqueo->numero = $input['numero'];

        
        
        $parqueo->save();

        return redirect('parqueo');
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
            return URL::to('parqueo/'.$id);
        }

        $parqueo = Parqueo::findOrfail($id);
        return view('parqueo.show',compact('parqueo'));
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
            return URL::to('parqueo/'. $id . '/edit');
        }

        
        $parqueo = Parqueo::findOrfail($id);
        return view('parqueo.edit',compact('parqueo'
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

        $parqueo = Parqueo::findOrfail($id);
    	
        $parqueo->numero = $input['numero'];
        
        
        $parqueo->save();

        return redirect('parqueo');
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
     	$parqueo->delete();
        return URL::to('parqueo');
    }

}
