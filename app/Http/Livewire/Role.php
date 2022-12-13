<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $roleName;
    public $search;
    public $selected_id;
    public $pageTitle;
    public $userSelected;

    public function mount()
    {
        $this->pageTitle = 'Listado de roles';
        $this->componentName = 'Roles';
    }
    public function Store()
    {
        $rules = ['roleName' => 'required|min:2|unique:roles,name'];
        $messages = [
            'roleName.required' => 'El nombre del rol es requerido',
            'roleName.min' => 'El nombre del rol debe tener al menos 3 caracteres',
            'roleName.unique' => 'El rol ya existe',
        ];

        $this->validate($rules, $messages);

        ModelsRole::create([
            'name' => $this->roleName,
        ]);
    }

    public function render()
    {

        return view('livewire.role.role', [
            'roles' => ModelsRole::orderBy('name', 'ASC')->get(),
        ])->extends('layouts.theme.apps')
            ->section('content');
    }
}
