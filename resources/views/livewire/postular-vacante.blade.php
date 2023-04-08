<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">

    <h3 class="text-center text-2xl font-bold my-4">
        Postularme a esta vacante
    </h3>

    @if (session()->has('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green font-bold p-2 my-5 text-sm rounded">
            {{ session('mensaje') }}
        </p>
    @else
        <form action="" class="w-96 my-5" wire:submit.prevent="postularme">
            <div class="mb-4">
                <x-input-label for="cv " :value="__('Curriculum o hoja de vida')" />
                <x-text-input id="cv" type="file" accept=".pdf" wire:model="cv" class="block my-1 w-full" />
                @error('cv')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror

                <x-primary-button class="my-5">
                    Postularme
                </x-primary-button>
            </div>
        </form>
    @endif


</div>
