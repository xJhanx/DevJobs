<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante; //modelo de vacante

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    //funciona como constuctor
    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        //almacernar cv ene l disco duro
        $datos = $this->validate();

        $cv = $this->cv->store('public/cv');
        $datos['cv'] = Str::replace('public/cv/','',$cv);

        //Crea los datos del candidato mediante la relacion
        //vacante_id se asigna automaticamente con la relacion
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        //crear la notficiacion y enviar correo
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo,auth()->user()->id));

        //mostrar al usuario un mensaje de ok
        session()->flash('mensaje', 'se envio corectamente tu informacion');
        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
