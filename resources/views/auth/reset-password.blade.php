<x-guest-layout>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Token de recuperación -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Correo electrónico -->
        <div>
            <x-input-label
                for="email"
                value="Correo electrónico"
                class="text-green-900"
            />

            <x-text-input
                id="email"
                class="block mt-1 w-full focus:border-green-600 focus:ring-green-600"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>


        <!-- Contraseña -->
        <div class="mt-4">

            <x-input-label
                for="password"
                value="Contraseña"
                class="text-green-900"
            />

            <x-text-input
                id="password"
                class="block mt-1 w-full focus:border-green-600 focus:ring-green-600"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>


        <!-- Confirmar contraseña -->
        <div class="mt-4">

            <x-input-label
                for="password_confirmation"
                value="Confirmar contraseña"
                class="text-green-900"
            />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full focus:border-green-600 focus:ring-green-600"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>


        <!-- Botón -->
        <div class="flex items-center justify-end mt-4">

            <x-primary-button
                class="bg-green-700 hover:bg-green-800 focus:bg-green-800 active:bg-green-900 focus:ring-green-500"
            >
                RESTABLECER CONTRASEÑA
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>