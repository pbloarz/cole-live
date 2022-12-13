<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use illuminate\Validation\Validator;

use function PHPUnit\Framework\isEmpty;

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
    public function store(UserRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->photo = null;
        $user->save();

        session()->flash('status', 'Usuario creado');

        return to_route('createUser');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('status', 'Usuario eliminado');
        return to_route('usuarios.index');
    }
    public function edit(User $user)
    {

        return view('hotel.users.edit', compact('user'));
    }
    public function update(UserUpdate $request, User $user)
    {

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->photo = null;

        if ($request->input('password')) {

            $user->password = bcrypt($request->input('password'));

        } else {
            $user->password = $user->password;
        }

        $user->save();

        session()->flash('status', 'Datos actualizados');
        return to_route('usuarios.index');
    }
}
