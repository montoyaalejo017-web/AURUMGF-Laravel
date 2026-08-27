<section class="space-y-6">

    <header>
        <h2 class="text-lg font-medium text-red-700">
            Eliminar cuenta
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Una vez eliminada tu cuenta, todos sus datos y recursos
            se eliminarán permanentemente.
        </p>

        <p class="mt-2 text-sm text-gray-600">
            Antes de eliminar tu cuenta, asegúrate de guardar cualquier
            información que quieras conservar.
        </p>
    </header>


    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        ELIMINAR CUENTA
    </x-danger-button>


    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >

        <form
            method="post"
            action="{{ route('profile.destroy') }}"
            class="p-6"
        >

            @csrf
            @method('delete')


            <h2 class="text-lg font-medium text-gray-900">
                ¿Estás seguro de que quieres eliminar tu cuenta?
            </h2>


            <p class="mt-1 text-sm text-gray-600">
                Esta acción no se puede deshacer. Todos los datos asociados
                a tu cuenta serán eliminados permanentemente.
                Ingresa tu contraseña para confirmar.
            </p>


            <!-- Contraseña -->
            <div class="mt-6">

                <x-input-label
                    for="password"
                    value="Contraseña"
                    class="sr-only"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 focus:border-green-600 focus:ring-green-600"
                    placeholder="Ingresa tu contraseña"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />

            </div>


            <!-- Botones -->
            <div class="mt-6 flex justify-end gap-3">

                <x-secondary-button
                    x-on:click="$dispatch('close')"
                >
                    CANCELAR
                </x-secondary-button>


                <x-danger-button>
                    ELIMINAR CUENTA
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>