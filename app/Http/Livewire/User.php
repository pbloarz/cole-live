<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{

    use WithPagination;
    public $search;
    public $selected_id;
    public $pagination = 5;
    public $name;
    public $email;
    public $password;
    public $role;


    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Usuarios';
    }
    public function Store()
    {
        $rules = [
            'name'  => ['required', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'min:8'],
            'role'  => ['required', 'not_in:Elegir']
        ];
        $messages = [
            'name.required' => 'Nombre requerido',
            'name.min' => 'Caracteres insuficientes',
            'email.required' => 'Email requerido',
            'email.unique' => 'Este email ya existe',
            'email.email' => 'No es un email',
            'password.required' => 'Contraseña requerida',
            'password.min' => 'la contraseña debe tener como mínimo 8 caracteres',
            'role.required' => 'Rol requerido',
            'role.not_in' => 'Rol debe ser diferente de Eligir',
        ];
        $this->validate($rules, $messages);
        
        ModelsUser::create([
            'name'  => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role,
        ]);
        
    }

    public function render()
    {
        if (strlen($this->search) > 0)
            $data = ModelsUser::where('name', 'like', '%' . $this->search . '%')
                ->paginate($this->pagination);
        else $data = ModelsUser::orderBy('id', 'DESC')->paginate($this->pagination);

        return view('livewire.user.user', [
            'users' => $data,
        ]);
    }
}
