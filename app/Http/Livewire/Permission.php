<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends Component
{
    use WithPagination;
    public $permissionName, $search, $selected_id, $pageTitle, $componentName, $userSelected;
    private $pagination = 10;
    


    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function  mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Permisos';
        
    }

    public function render()
    {
        $permisos = ModelsPermission::orderBy('id')->get();
        return view('livewire.permission.permission',compact('permisos'))->extends('layouts.theme.apps')
        ->section('content');
    }
}
