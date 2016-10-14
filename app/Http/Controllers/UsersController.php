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
use DB;
use Yajra\Datatables\Facades\Datatables;

class UsersController extends Controller
{


    public function index(Request $request)
    {
       
        return view('user.index');
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

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->update();
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


    public function getDataTable(){

         $users = User::select(['id', 'name', 'usuario', 'email',  'tipo', 'status']);

         return Datatables::of($users)
            ->editColumn('tipo', function($user){

                if(($user->tipo == "admin") || ($user->tipo == "super_admin")){
                      return '<span class="label label-danger"> <i class="fa fa-lock"></i>-'. $user->tipo .'</span>';
                }else{
                        return '<span class="label label-primary"> <i class="fa fa-users  "></i>  - '. $user->tipo .'</span>';
                }
            })
            ->editColumn('status', function($user){
                if($user->status == 1){
                    return '<span class="label label-success"> <i class="fa fa-check-square"></i></span>';
                }
                else{
                    return '<span class="label label-danger"> <i class="fa fa-minus-square"></i></span>';
                }
                
            })

            ->editColumn('acciones', function($user){
                return '<a href="users/'.$user->id.'/edit" class="btn btn-warning" title="Editar"><i class="fa fa-pencil-square-o"></i></a> <a href="users/'.$user->id.'/destroy"class="btn btn-danger" title="Elimiar" onclick="return confirm(\'¿Seguro que desea eliminar el registro?\')"><i class="fa fa-trash"></i></a>';
            })



            ->make(true);

    }
}
