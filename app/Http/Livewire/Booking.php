<?php

namespace App\Http\Livewire;

use App\Models\book;
use App\Models\reservation;
use App\Models\User;
use Livewire\Component;

class Booking extends Component
{

    public $selected_id;
    public $users_id;
    public $books_id;
    public $days;
    public $search;

    public function mount()
    {
        $this->pageTitle = 'Listado de reservas';
        $this->componentName = 'Reservas';
    }
    public function render()
    {

        $reservations = reservation::orderBy('id')->get();
        $users = User::orderBy('id')->get();
        $books = book::orderBy('id')->get();

        return view('livewire.booking.booking', compact('reservations', 'users', 'books'))->extends('layouts.theme.apps')
            ->section('content');
    }
    public function Store()
    {
        $rules = [
            'users_id'  => 'required',
            'books_id' => 'required',
            'days' => 'required',
        ];
        $messages = [

            'users_id.required' => 'Usuario requerido',
            'books_id.required' => 'Líbro requerido',
            'days_id.required' => 'Días requeridos',

        ];

        $this->validate($rules, $messages);
        reservation::create([
            'users_id' => $this->users_id,
            'books_id' => $this->books_id,
            'days' => $this->days, 
        ]);
        $this->emit('item-added', 'Reserva Registrada');
    }
}
