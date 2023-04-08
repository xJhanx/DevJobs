<form action="" class="md:w-1/2" wire:submit.prevent="crearVacante">

    {{-- Titulo --}}
    <div class="mt-4 ">
        <x-input-label for="titlo" :value="__('Título vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo"  placeholder="titulo vacante" />
        @error('titulo')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Salario mensual  --}}
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select wire:model="salario_id" id="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-> Seleccione <-</option>
            @foreach ($salarios as $salario)
            <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>

        @error('salario')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>


    {{-- Categoria  --}}
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('categoria')" />
        <select wire:model="categoria_id" id="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-> Seleccione <-</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>

        @error('categoria')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Empresa --}}
    <div class="mt-4 ">
        <x-input-label for="empresa" :value="__('empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" placeholder="Empresa " />

        @error('empresa')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- ultimo dia --}}
    <div class="mt-4 ">
        <x-input-label for="ultimo dia " :value="__('Ultimo dia para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            placeholder="Ultimo dia para postularse" />

            @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
            @enderror
    </div>

    {{-- Descripcion del trabajo --}}
    <div class="mt-4 ">
        <x-input-label for="descripcion" :value="__('Descripcion del trabajo')" />
        <textarea wire:model="descripcion"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" cols="30"
            rows="10"></textarea>

            @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
            @enderror
    </div>

    {{-- Archivo imagen --}}
    <div class="mt-4 ">
        <x-input-label for="imagen" :value="__('imagen')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="file" accept="image/*" wire:model="imagen" />
        @error('imagen')
        <livewire:mostrar-alerta :message="$message" />
        @enderror

        <div class="my-5 w-96">
            @if($imagen)
                Imagen:
                <img src="{{$imagen->temporaryUrl()}}" alt="" srcset="">
            @endif

        </div>
    </div>

    <x-primary-button class="mt-4">
        Crear vacante
    </x-primary-button>
</form>
