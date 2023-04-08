<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class EditarVacante extends Component
{

    use WithFileUploads;

    public $vacante_id; //no se puede utilizar $id porque es variable reservada de livewire
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required',
        'categoria_id' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva'   => 'nullable|image|max:1024',

        //no se valida la imagen , en caso de no tener nada no se valida la imagen
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario_id = $vacante->salario_id;
        $this->categoria_id = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion =  $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante(){
        $datos = $this->validate();

        //si hay una nueva imagen
        if($this->imagen_nueva){
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = Str::replace('public/vacantes/','',$imagen);
        }

        //encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        //asiganar valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario_id'];
        $vacante->categoria_id = $datos['categoria_id'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;
        //guardar y redireccionar
        $vacante->save();

        session()->flash('mensaje', 'Se ha actualizado correctamente');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante',compact('salarios','categorias'));
    }
}
