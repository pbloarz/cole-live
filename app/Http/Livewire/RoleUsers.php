<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RoleUsers extends Component
{
    public $componentName = 'Administracion de usuarios ';
    public $pageName = 'Usuarios y roles';
    
    public function render()
    {
        return view('livewire.role-users')->extends('layouts.theme.apps')
            ->section('content');
    }
}
