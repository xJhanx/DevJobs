<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    //escucha , funciona llamar
    protected $listeners = ['terminosBusqueda' => 'buscar'];
    //variables
    public $termino;
    public $categoria;
    public $salario;

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }


    public function render()
    {
        //$vacantes = Vacante::all();
        $vacantes = Vacante::when($this->termino, function ($query) {
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->termino, function ($query) {
            $query->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function ($query) {
            $query->where('categoria_id', $this->categoria);
        })->when($this->salario, function ($query) {
            $query->where('salario_id', $this->salario);
        })->get();

        return view('livewire.home-vacantes', compact('vacantes'));
    }
}
