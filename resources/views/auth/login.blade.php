<x-guest-layout>

    <!-- Mensaje de sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-green-800">
            AURUMGF
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Administración del Glamping
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Correo electrónico -->
        <div>
            <x-input-label
                for="email"
                value="Correo electrónico"
                class="text-green-900 font-semibold"
            />

            <x-text-input
                id="email"
                class="block mt-2 w-full border-gray-300 rounded-lg
                       focus:border-green-600 focus:ring-green-600"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Ingresa tu correo electrónico"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <!-- Contraseña -->
        <div class="mt-5">
            <x-input-label
                for="password"
                value="Contraseña"
                class="text-green-900 font-semibold"
            />

            <x-text-input
                id="password"
                class="block mt-2 w-full border-gray-300 rounded-lg
                       focus:border-green-600 focus:ring-green-600"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Ingresa tu contraseña"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Recordarme -->
        <div class="mt-5">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300
                           text-green-700
                           shadow-sm
                           focus:ring-green-600"
                    name="remember"
                >

                <span class="ms-2 text-sm text-gray-600">
                    Recordarme
                </span>

            </label>
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between mt-6">

            @if (Route::has('password.request'))
                <a
                    class="text-sm text-green-700 underline
                           hover:text-green-900
                           focus:outline-none
                           focus:ring-2
                           focus:ring-green-600
                           rounded-md"
                    href="{{ route('password.request') }}"
                >
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

            <x-primary-button
                class="ms-3
                       bg-green-700
                       hover:bg-green-800
                       focus:bg-green-800
                       active:bg-green-900
                       focus:ring-green-500
                       px-6
                       py-3
                       rounded-lg
                       font-semibold"
            >
                INICIAR SESIÓN
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>