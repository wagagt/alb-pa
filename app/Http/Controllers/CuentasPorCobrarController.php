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


class CuentasPorCobrarController extends Controller
{

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
}
