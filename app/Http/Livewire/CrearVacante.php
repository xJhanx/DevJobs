<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CrearVacante extends Component
{
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required',
        'categoria_id' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen'   => 'required|image|max:1024',
    ];

    public function crearVacante(){
        $datos = $this->validate();
        //1ro guardar la imagen

        $imagen = $this->imagen->store('public/vacantes');
        $nombre_imagen = Str::replace('public/vacantes/','',$imagen);

        //almacena la vacante

        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario_id'],
            'categoria_id' => $datos['categoria_id'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen'   => $nombre_imagen,
            'user_id' => auth()->user()->id
        ]);

        session()->flash('mensaje','La vacante se publico correctamente');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',compact('salarios','categorias'));
    }
}
