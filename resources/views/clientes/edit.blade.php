<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                    Editar cliente
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Actualiza la información del cliente.
                </p>
            </div>

            <a
                href="{{ route('clientes.index') }}"
                class="inline-flex items-center px-5 py-3 bg-green-50 border border-green-200 rounded-lg font-semibold text-sm text-green-800 hover:bg-green-100 transition"
            >
                ← Volver a clientes
            </a>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="p-6">

                    <h3 class="text-xl font-semibold text-gray-800">
                        Información del cliente
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Modifica los datos de {{ $cliente->nombre }} {{ $cliente->apellido }}.
                    </p>


                    {{-- Errores --}}

                    @if ($errors->any())

                        <div class="mt-6 bg-red-50 border border-red-200 rounded-lg p-4">

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


                    {{-- Formulario --}}

                    <form
                        action="{{ route('clientes.update', $cliente) }}"
                        method="POST"
                        class="mt-6"
                    >

                        @csrf

                        @method('PUT')


                        {{-- Nombre y apellido --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

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
                                    value="{{ old('nombre', $cliente->nombre) }}"
                                    required
                                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                >

                            </div>


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
                                    value="{{ old('apellido', $cliente->apellido) }}"
                                    required
                                    class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                >

                            </div>

                        </div>


                        {{-- Documento --}}

                        <div class="mt-5">

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
                                value="{{ old('documento', $cliente->documento) }}"
                                required
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        {{-- Teléfono --}}

                        <div class="mt-5">

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
                                value="{{ old('telefono', $cliente->telefono) }}"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        {{-- Correo --}}

                        <div class="mt-5">

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
                                value="{{ old('email', $cliente->email) }}"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        {{-- Observaciones --}}

                        <div class="mt-5">

                            <label
                                for="observaciones"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Observaciones
                            </label>

                            <textarea
                                name="observaciones"
                                id="observaciones"
                                rows="4"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >{{ old('observaciones', $cliente->observaciones) }}</textarea>

                        </div>


                        {{-- Botones --}}

                        <div class="mt-8 flex items-center gap-3">

                            <button
                                type="submit"
                                class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                            >
                                Actualizar cliente
                            </button>

                            <a
                                href="{{ route('clientes.index') }}"
                                class="inline-flex items-center px-5 py-3 bg-gray-100 border border-gray-200 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-200 transition"
                            >
                                Cancelar
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>s