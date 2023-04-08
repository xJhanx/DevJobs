<div class="p-10">
    <div class="mb-5 ">
        <h3 class="font-bold text-3xl text-gray-800 my-3 ">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 ">

            <p class="font-bold text-sm uppercase text-gray-800 my-10">Empresa :
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-5">ultimo dia para postularse :
                <span class="normal-case font-normal">{{ $ultimo_dia }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-5">Categoria :
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-5">Salario :
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>
        </div>

        <div class="md:grid md:grid-cols-6 gap-8 my-10">
            <div class="md:col-span-2">
                <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                    alt="imagen de la vacante {{ $vacante->titulo }}" srcset="">
            </div>
            <div class="md:col-span-4">
                <h2 class="text-2xl font-bold mb-5 ">Descripcion del Puesto:</h2>
                <p>{{ $vacante->descripcion }}</p>
            </div>

        </div>
        @guest

            <div class="my-5 bg-gra-50 border border-dashed p-5 text-center">
                ¿Deseas aplicar o postularte a esta vacante? <a class="font-bold text-indigo-600"
                    href="{{ route('register') }}">Aplica a esta otras vacantes</a>
            </div>
        @endguest


        @auth

            @cannot('create', $vacante)
                <livewire:postular-vacante :vacante="$vacante" />
            @endcannot
        @endauth
    </div>
</div>
