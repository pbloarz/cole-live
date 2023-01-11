<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Asignar extends Component
{

    public $pageTitle;
    public $componentName;
    public $permisos;
    
    public function mount()
    {
        $this->pageTitle = 'Listado de roles';
        $this->componentName = 'Roles';
        $this->roles = Role::orderBy('id')->get();
        $this->permisos = Permission::orderBy('id')->get();
        
    }
    public function render()
    {

        return view('livewire.asignar.asignar')->extends('layouts.theme.apps')
        ->section('content');
    }
}
