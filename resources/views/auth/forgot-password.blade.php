<x-guest-layout>

    <!-- Mensaje -->
    <div class="mb-6 text-sm text-gray-600 leading-6">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Correo electrónico -->
        <div>
            <x-input-label
                for="email"
                :value="__('Correo electrónico')"
                class="text-green-800 font-semibold"
            />

            <x-text-input
                id="email"
                class="block mt-2 w-full focus:border-green-600 focus:ring-green-600"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Ingresa tu correo electrónico"
                required
                autofocus
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <!-- Botón -->
        <div class="flex items-center justify-end mt-5">

            <x-primary-button
                class="bg-green-700 hover:bg-green-800 focus:bg-green-800 active:bg-green-900"
            >
                {{ __('ENVIAR ENLACE DE RESTABLECIMIENTO') }}
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>