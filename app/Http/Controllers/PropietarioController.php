<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Apartamento;
use App\Documento;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

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
        $user = User::findOrfail($id);
        // dd($user);

        //if (Auth::user()->id == $id){
        Flash::warning('Debe completar los datos de su perfil y cambiar su contraseña!.');
        return view('propietario.edit')
            ->with('usuario',$user);
        //}else{
        //  Flash::success('No es posible accesar la URL requerida');
        //return view('propietario.dash');
        //}
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::findOrfail($id);
        $user->fill($request->all());
        $user->save();
        Flash::success('El perfil ha sido actualizado con éxito!!');
        return view('propietario.dash');
    }

    public function destroy($id)
    {
        //
    }

    public function documentos(Request $request)
    {
        //dd('llego a propietario documentos');
        $input = $request->all();
        $userId = \Auth::user()->id;
        //dd($input, $userId);
        $apto = Apartamento::where('user_id', '=', $userId)->select('torre_id')
            ->first();
        dd($apto);
        $documentos = Documento::where('torre_id', '=', $apto->torre_id)
            ->orderBy('nombre', 'ASC')
            ->paginate(25);
        return view('documento.prop_index')
            ->with('documentos', $documentos);
    }
}
