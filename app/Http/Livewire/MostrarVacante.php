<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class MostrarVacante extends Component
{
    public $vacante;
    public function render()
    {
        $ultimo_dia = Carbon::parse($this->vacante->ultimo_dia)->toFormattedDateString();
        return view('livewire.mostrar-vacante',compact('ultimo_dia'));
    }
}
