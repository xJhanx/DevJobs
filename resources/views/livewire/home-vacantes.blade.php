<div>
    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class=" w-9/12 mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">
               Nuestras Vacantes disponibles
            </h3>

            <div class="bg-white shadow-sm rounded-lg p-6">

                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5 divide-y divide-gray-200">
                        <div class="md:flex-1 ">

                            <a  href="{{route('vacantes.show',$vacante->id)}}"
                                class="text-3xl font-extrabold text-gray-600">
                                {{$vacante->titulo}}
                            </a>

                            <p class="text-base text-gray-600 mbb-3">
                                Empresa:{{$vacante->empresa}}
                            </p>
                            <p class="text-base text-gray-600 mbb-3">
                                Categoria: {{$vacante->categoria->categoria}}
                            </p>
                            </p>
                            <p class="text-base text-gray-600 mbb-3">
                                Salario: {{$vacante->salario->salario}}
                            </p>
                            <p>
                                Ultimo dia para postularse: <span class="font-bold text-xs text-gray-600">
                                    {{$vacante->ultimo_dia}}
                                    </span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-gray-900 p-3 uppercase text-sm font-bold text-white rounded-lg block text-center"
                            href="{{route('vacantes.show',$vacante->id)}}">Ver vacante</a>
                        </div>
                    </div>
                @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
