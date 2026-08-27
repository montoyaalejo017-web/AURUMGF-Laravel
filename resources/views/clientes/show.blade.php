<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                Detalle del cliente
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Información registrada del cliente.
            </p>
        </div>
    </x-slot>


    <div class="py-8">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Botón volver -->
            <div class="mb-6">

                <a
                    href="{{ route('clientes.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-green-200 rounded-lg font-semibold text-sm text-green-800 hover:bg-green-50 transition"
                >
                    ← Volver a clientes
                </a>

            </div>


            <!-- Información del cliente -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <!-- Encabezado -->
                <div class="p-6 border-b border-gray-100">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Cliente
                            </p>

                            <h3 class="mt-1 text-2xl font-bold text-gray-800">
                                {{ $cliente->nombre }}
                                {{ $cliente->apellido }}
                            </h3>

                        </div>


                        <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">

                            <span class="text-2xl">
                                👤
                            </span>

                        </div>

                    </div>

                </div>


                <!-- Datos -->
                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        <!-- Documento -->
                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Documento
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                {{ $cliente->documento }}
                            </p>

                        </div>


                        <!-- Teléfono -->
                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Teléfono
                            </p>

                            <p class="mt-1 text-base text-gray-800">

                                {{ $cliente->telefono ?: 'No registrado' }}

                            </p>

                        </div>


                        <!-- Correo -->
                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Correo electrónico
                            </p>

                            <p class="mt-1 text-base text-gray-800">

                                {{ $cliente->email ?: 'No registrado' }}

                            </p>

                        </div>


                        <!-- ID -->
                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                ID del cliente
                            </p>

                            <p class="mt-1 text-base text-gray-800">
                                #{{ $cliente->id }}
                            </p>

                        </div>


                    </div>


                    <!-- Observaciones -->
                    <div class="mt-8">

                        <p class="text-sm font-medium text-gray-500">
                            Observaciones
                        </p>

                        <div class="mt-2 p-4 bg-gray-50 rounded-lg">

                            <p class="text-gray-700">

                                {{ $cliente->observaciones ?: 'Sin observaciones.' }}

                            </p>

                        </div>

                    </div>

                </div>


                <!-- Acciones -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">

                    <a
                        href="{{ route('clientes.edit', $cliente) }}"
                        class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                    >
                        Editar cliente
                    </a>


                    <a
                        href="{{ route('clientes.index') }}"
                        class="inline-flex items-center px-5 py-3 bg-white border border-green-200 rounded-lg font-semibold text-sm text-green-800 hover:bg-green-50 transition"
                    >
                        Volver a clientes
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>