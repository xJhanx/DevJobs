<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <h1 class="text-2xl font-bold text-center mb-10">Mis notificaciones</h1>
                    @forelse ($notificaciones as $notificacion)
                        <div class="lg:flex lg:justify-between lg:items-center p-5 border border-gray-200">

                            <div>
                                <p>Tienes un nuevo candidato en : <span
                                        class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span></p>
                                <p>Hace :<span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                </p>
                            </div>

                            <div class="my-3">
                                <a href="{{route('candidatos.index',$notificacion->data['id_vacante'])}}"
                                    class="bg-gray-900 p-3 uppercase text-sm font-bold text-white rounded-lg">Ver
                                    candidatos</a>
                            </div>
                        </div>
                    @empty
                        <p class="font-bold text-gray text-center ">No hay notificaciones nuevas</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
