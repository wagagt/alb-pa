<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Image;

class UsersController extends Controller
{


    public function index(Request $request)
    {
        $users = User::search($request->name)->orderBy('name', 'ASC')->paginate(25);
        return view('user.index')
            ->with('users', $users);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest  $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        Flash::success('Se ha registrado '.$user->name. ' de forma exitosa!!');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $user = User::find($id);
          return view('user.edit')->with('usuario', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Flash::warning('El usuario '.$user->name.' ha sido actualizado con éxito!!');
        return redirect()->route('users.index');
    }

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
    
    public function profile(){
        $typeOfUser = (\Auth::user()->isAdmin()) ? "admin" : "propietario";
        return view($typeOfUser.'.profile', array('user'=> \Auth::user()));
    }
    
    public function updateAvatar(Request $request){
        // handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('uploads/avatars/' . $filename ));
            $user = \Auth::user();
            $user->avatar =$filename;
            $user->save();
        }
        $typeOfUser = (\Auth::user()->isAdmin()) ? "admin" : "propietario";
        return view($typeOfUser.'.profile', array('user'=> \Auth::user()));
    }
}
