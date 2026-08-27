<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                Nuevo cliente
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Registra un nuevo cliente para AURUMGF.
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


            <!-- Formulario -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <!-- Encabezado -->
                <div class="p-6 border-b border-gray-100">

                    <h3 class="text-xl font-semibold text-gray-800">
                        Información del cliente
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Completa los datos del cliente.
                    </p>

                </div>


                <!-- Errores -->
                @if ($errors->any())

                    <div class="mx-6 mt-6 p-4 bg-red-50 border border-red-200 rounded-lg">

                        <p class="font-semibold text-red-800">
                            Hay algunos errores:
                        </p>

                        <ul class="mt-2 list-disc list-inside text-sm text-red-700">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- Formulario -->
                <form
                    action="{{ route('clientes.store') }}"
                    method="POST"
                >

                    @csrf


                    <div class="p-6 space-y-6">


                        <!-- Nombre y apellido -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            <!-- Nombre -->
                            <div>

                                <label
                                    for="nombre"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Nombre
                                </label>

                                <input
                                    type="text"
                                    name="nombre"
                                    id="nombre"
                                    value="{{ old('nombre') }}"
                                    required
                                    autofocus
                                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Ej. Juan"
                                >

                            </div>


                            <!-- Apellido -->
                            <div>

                                <label
                                    for="apellido"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Apellido
                                </label>

                                <input
                                    type="text"
                                    name="apellido"
                                    id="apellido"
                                    value="{{ old('apellido') }}"
                                    required
                                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Ej. Pérez"
                                >

                            </div>

                        </div>


                        <!-- Documento y teléfono -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            <!-- Documento -->
                            <div>

                                <label
                                    for="documento"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Documento
                                </label>

                                <input
                                    type="text"
                                    name="documento"
                                    id="documento"
                                    value="{{ old('documento') }}"
                                    required
                                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Ej. 1234567890"
                                >

                            </div>


                            <!-- Teléfono -->
                            <div>

                                <label
                                    for="telefono"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Teléfono
                                </label>

                                <input
                                    type="text"
                                    name="telefono"
                                    id="telefono"
                                    value="{{ old('telefono') }}"
                                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Ej. 3001234567"
                                >

                            </div>

                        </div>


                        <!-- Correo -->
                        <div>

                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                placeholder="Ej. cliente@correo.com"
                            >

                        </div>


                        <!-- Observaciones -->
                        <div>

                            <label
                                for="observaciones"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Observaciones
                            </label>

                            <textarea
                                name="observaciones"
                                id="observaciones"
                                rows="5"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                placeholder="Agrega cualquier información importante sobre el cliente..."
                            >{{ old('observaciones') }}</textarea>

                        </div>


                    </div>


                    <!-- Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">

                        <a
                            href="{{ route('clientes.index') }}"
                            class="inline-flex items-center px-5 py-3 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-100 transition"
                        >
                            Cancelar
                        </a>


                        <button
                            type="submit"
                            class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                        >
                            Guardar cliente
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>