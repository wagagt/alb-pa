<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
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
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    
    public function getDashboard()
    {
    $userId = \Auth::user()->id;
     if (\Auth::user()->isAdmin()){
			return redirect()->route('admin.home');
		}
		$hashType='$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi';

		if ((\Auth::user()->tipo == 'propietario') && (\Auth::user()->password === $hashType)){
			return redirect('propietario/'.$userId.'/edit');

		}else{
		    $tipoDocumentos=\App\Tipo_documento::where('torre_id',\Auth::user()->getTorre())->orderBy('descripcion')->get();
			return view('propietario.dash', ['tipoDocumentos'=>$tipoDocumentos]);
		}
    }
    
    public function getTiposDocumento()
    {   
        $tipoDocumentos=\App\Tipo_documento::where('torre_id',\Auth::user()->getTorre())->orderBy('descripcion')->get();
        $jsonData = json_decode($tipoDocumentos);
        return $jsonData;
    }
    
}
