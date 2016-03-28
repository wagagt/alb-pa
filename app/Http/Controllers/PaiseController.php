<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PaisRequest;
use App\Http\Controllers\Controller;
use Amranidev\Ajaxis\Ajaxis;
use Laracasts\Flash\Flash;
use App\Paise;
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
    public function index(Request $request)
    {
        $paises = Paise::search($request->pais)->orderBy('pais', 'ASC')->paginate(5);
        return view('pais.index')->with('paises', $paises);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(PaisRequest $request)
    {
        $pais = new Paise($request->all());
        $pais->save();
        Flash::success('Pais "'.$pais->pais.'" ha sido agregado con éxito!..');

        return redirect()->route('pais.index');
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
        $paise = Paise::findOrfail($id);
        return view('pais.edit')->with('pais',$paise);
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
        $pais = Paise::findOrfail($id);
        $pais->fill($request->all());
        $pais->save();
            Flash::warning('El país "'.$pais->pis.'" ha sido actualizado con éxito!!');
        return redirect()->route('pais.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$pais = Paise::findOrfail($id);
     	$pais->delete();
      Flash::error('El País  "'.$pais->pais. '" ha sido borrado de forma exitosa!!');
        return redirect()->route('pais.index');
    }

}
