<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">

                <div class="leading-10">
                    <a href="{{route('vacantes.show',$vacante->id)}}" class="text-xl font-bold">{{ $vacante->titulo }}</a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>

                    <p class="text-sm text-gray-500">Ultimo dia: {{ date('d/m/Y', strtotime($vacante->ultimo_dia)) }}
                    </p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 my-5 md:my-0">
                    <a href="{{route('candidatos.index',$vacante)}}"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">{{$vacante->candidatos->count()}} Candidatos</a>
                    <a href="{{ route('vacantes.edit', $vacante) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>
                    <button wire:click="$emit('showAlert',{{$vacante->id}})"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Eliminar</button>

                </div>

            </div>
        @empty
            <p class="text-sm text-gray-600 text-center">No hay vacantes</p>
        @endforelse
    </div>

    <div class=" mt-10">
        {{ $vacantes->links() }}

    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>

            Livewire.on('showAlert',vacante_id => {
                Swal.fire({
                    title: 'Eliminar vacante?',
                    text: "quedara eliminada por siempre!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, eliminalo!'
                }).then((result) => {
                    //emite un evento al componente

                    Livewire.emit('eliminarVacante',vacante_id)
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Una vacante eliminada.',
                            'success'
                        )
                    }
                })
            });
            // El siguiente código es el Alert utilizado
        </script>
    @endpush
</div>
