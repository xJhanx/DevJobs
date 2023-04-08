<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use DebugBar\DebugBar;
use Livewire\Component;

class MostrarVacantes extends Component
{
   protected $listeners = ['eliminarVacante']; //forma de llamar con eventos desde blade hacia aca

    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(3);
        return view('livewire.mostrar-vacantes',compact('vacantes'));
    }
    // public function prueba($vacante_id){
    //     dd($vacante_id);
    // }

    //recibe con route model binding
    public function eliminarVacante(Vacante $vacante){
        $vacante->delete();
    }
}
