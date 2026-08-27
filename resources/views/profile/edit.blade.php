<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                Configuración de cuenta
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Administra la información y seguridad de tu cuenta AURUMGF.
            </p>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">


            {{-- Información del perfil --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="p-6 sm:p-8">

                    <div class="max-w-xl">

                        @include(
                            'profile.partials.update-profile-information-form'
                        )

                    </div>

                </div>

            </div>


            {{-- Cambiar contraseña --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="p-6 sm:p-8">

                    <div class="max-w-xl">

                        @include(
                            'profile.partials.update-password-form'
                        )

                    </div>

                </div>

            </div>


            {{-- Eliminar cuenta --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="p-6 sm:p-8">

                    <div class="max-w-xl">

                        @include(
                            'profile.partials.delete-user-form'
                        )

                    </div>

                </div>

            </div>


        </div>

    </div>

</x-app-layout>