<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Validation\Validator;

class UserController extends Controller
{
    public function index()
    {

        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('hotel.users.index', [
            'users' => $users,
            'componentName' => 'Usuarios',
            'pageTitle' => 'Listado de Usuarios',
            'selected_id' => 0,

        ]);
        return redirect()->route('usuarios.index');
    }

    public function crear()
    {

        return view('hotel.users.create');
    }
    public function store(UserRequest
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $request)
    {

        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->photo = null;
        $user->save();
        
        session()->flash('status','Usuario creado');

        return to_route('createUser');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('status','Usuario eliminado');
        return to_route('usuarios.index');
    }
    public function edit(User $user){        

        return view('hotel.users.edit',compact('user'));
    }
    public function update(){

    }
}
