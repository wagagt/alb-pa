<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UsersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::search($request->name)->orderBy('name', 'ASC')->paginate(15);
        return view('user.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest  $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        //dd($user);

        $user->save();

        Flash::success('Se ha registrado '.$user->name. ' de forma exitosa!!');

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //dd($user->id);

          return view('user.edit')->with('usuario', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        //dd($user);
        $user->save();

        Flash::warning('El usuario '.$user->name.' ha sido actualizado con éxito!!');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(($user->tipo == 'admin') || ($user->tipo == 'super_admin') )
        {
              Flash::error('El usuario '.$user->name.' es administrador no es posible borrarlo');
              return redirect()->route('users.index');
        }else{
            $user->delete();
            Flash::error('El usuario '.$user->name. ' ha sido borrado de forma exitosa!!');
            return redirect()->route('users.index');
          }
    }
}