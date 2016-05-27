<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;

class PropietarioController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (\Auth::user()->id == $id){
            Flash::warning('Debe completar los datos de su perfil.');
            return view('propietario.edit')
            ->with('usuario',$user);
        }else{
            Flash::success('No es posible accesar la URL requerida');
            return view('propietario.dash');
        }
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::findOrfail($id);
        $user->fill($request->all());
        $user->save();
        Flash::success('El perfil ha sido actualizado con éxito!!');
        return redirect()->route('propietario.dash');
    }

    public function destroy($id)
    {
        //
    }
}
