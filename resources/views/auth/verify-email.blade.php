<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Gracias por suscribirte con nosotros, para completar el proceso , porfavor verficica tu correo electronico , hemos enviado un enlace : abrelo') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Te llegará un correo electroncio con un link para completar la verificación.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Re enviar el Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar sessión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
