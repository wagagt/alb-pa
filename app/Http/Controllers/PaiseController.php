<?php
namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Paise;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PaiseController
 *
 * @author  The scaffold-interface created at 2016-03-02 07:24:51pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class PaiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Paise::orderBy('pais', 'ASC')->paginate(5);
        return view('paise.index',compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {

        return view('paise.create'
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

        $paise = new Paise();


        $paise->pais = $input['pais'];


        $paise->ciudad = $input['ciudad'];



        $paise->save();

        return redirect('paise');
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
            return URL::to('paise/'.$id);
        }

        $paise = Paise::findOrfail($id);
        return view('paise.show',compact('paise'));
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
            return URL::to('paise/'. $id . '/edit');
        }


        $paise = Paise::findOrfail($id);
        return view('paise.edit',compact('paise'
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

        $paise = Paise::findOrfail($id);

        $paise->pais = $input['pais'];

        $paise->ciudad = $input['ciudad'];


        $paise->save();

        return redirect('paise');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/paise/'. $id . '/delete/');

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
     	$paise = Paise::findOrfail($id);
     	$paise->delete();
        return URL::to('paise');
    }

}
