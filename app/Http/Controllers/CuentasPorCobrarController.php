<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cxc;
use App\Models\CxcApartamentos;
use App\Torre;
use DB;
use Yajra\Datatables\Facades\Datatables;
use Carbon\Carbon;
use Laracasts\Flash\Flash;


class CuentasPorCobrarController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        return view('cxc.index');
    }


    public function create()
    {
        $torres = Torre::orderBy('id', 'ASC')->lists('nombre','id')->prepend('Seleccione un edificio');

        return view('cxc.create')
               ->with('edificios', $torres);
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $dateRepIni =  str_replace('/', '-',$input['fini']);
        $toTimeIni  =  date('Y-m-d H:i:s', strtotime($dateRepIni));
        if($input['ffin'] != null) {
            $dataRepFin = str_replace('/', '-', $input['ffin']);
            $toTimeFin  =  date('Y-m-d H:i:s', strtotime($dataRepFin));
        }else{
            $toTimeFin = '';
        }

        $cxcSave = new Cxc($request->all());
        $cxcSave->fecha_inicio_cobro = $toTimeIni;
        $cxcSave->fecha_fin_cobro    = $toTimeFin;
        $cxcSave->status             = $request->status;
        //dd($cxcSave);
        $cxcSave->save();
        Flash::success('Cuenta x Cobrar <b>'. $cxcSave->nombre .'</b> creada con éxito');
        return redirect()->route('cxc.generate',$cxcSave->id);



        //$cxc = new Cxc($request->all());

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function generarCxc($id)
    {
        return view('cxc.generate');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
