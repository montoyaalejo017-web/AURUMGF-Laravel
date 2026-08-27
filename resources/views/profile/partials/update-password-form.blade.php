<section>
    <header>
        <h2 class="text-lg font-medium text-green-800">
            Cambiar contraseña
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Actualiza la contraseña de tu cuenta para mantenerla segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">

        @csrf
        @method('put')

        <!-- Contraseña actual -->
        <div>
            <x-input-label
                for="current_password"
                value="Contraseña actual"
            />

            <x-text-input
                id="current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full focus:border-green-600 focus:ring-green-600"
                autocomplete="current-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('current_password')"
            />
        </div>


        <!-- Nueva contraseña -->
        <div>
            <x-input-label
                for="password"
                value="Nueva contraseña"
            />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full focus:border-green-600 focus:ring-green-600"
                autocomplete="new-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password')"
            />
        </div>


        <!-- Confirmar contraseña -->
        <div>
            <x-input-label
                for="password_confirmation"
                value="Confirmar nueva contraseña"
            />

            <x-text-input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full focus:border-green-600 focus:ring-green-600"
                autocomplete="new-password"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->updatePassword->get('password_confirmation')"
            />
        </div>


        <!-- Botón -->
        <div class="flex items-center gap-4">

            <x-primary-button>
                GUARDAR CAMBIOS
            </x-primary-button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >
                    Contraseña actualizada correctamente.
                </p>

            @endif

        </div>

    </form>

</section>