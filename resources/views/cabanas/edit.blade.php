<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                    Editar cabaña
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Actualiza la información de la cabaña.
                </p>
            </div>

            <a
                href="{{ route('cabanas.index') }}"
                class="inline-flex items-center px-5 py-3 bg-green-50 border border-green-200 rounded-lg font-semibold text-sm text-green-800 hover:bg-green-100 transition"
            >
                ← Volver a cabañas
            </a>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="p-6">

                    <h3 class="text-xl font-semibold text-gray-800">
                        Información de la cabaña
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Modifica los datos de {{ $cabana->nombre }}.
                    </p>


                    {{-- Mensaje de errores --}}

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
                        action="{{ route('cabanas.update', $cabana) }}"
                        method="POST"
                        class="mt-6"
                    >

                        @csrf

                        @method('PUT')


                        {{-- Nombre --}}

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
                                value="{{ old('nombre', $cabana->nombre) }}"
                                required
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        {{-- Descripción --}}

                        <div class="mt-5">

                            <label
                                for="descripcion"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Descripción
                            </label>

                            <textarea
                                name="descripcion"
                                id="descripcion"
                                rows="4"
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >{{ old('descripcion', $cabana->descripcion) }}</textarea>

                        </div>


                        {{-- Capacidad --}}

                        <div class="mt-5">

                            <label
                                for="capacidad"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Capacidad de huéspedes
                            </label>

                            <input
                                type="number"
                                name="capacidad"
                                id="capacidad"
                                min="1"
                                value="{{ old('capacidad', $cabana->capacidad) }}"
                                required
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        {{-- Precio por noche --}}

                        <div class="mt-5">

                            <label
                                for="precio_noche"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Precio por noche
                            </label>

                            <input
                                type="number"
                                name="precio_noche"
                                id="precio_noche"
                                min="0"
                                step="0.01"
                                value="{{ old('precio_noche', $cabana->precio_noche) }}"
                                required
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        {{-- Estado --}}

                        <div class="mt-5">

                            <label
                                for="estado"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Estado
                            </label>

                            <select
                                name="estado"
                                id="estado"
                                required
                                class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            >

                                <option
                                    value="disponible"
                                    {{ old('estado', $cabana->estado) == 'disponible' ? 'selected' : '' }}
                                >
                                    Disponible
                                </option>

                                <option
                                    value="mantenimiento"
                                    {{ old('estado', $cabana->estado) == 'mantenimiento' ? 'selected' : '' }}
                                >
                                    Mantenimiento
                                </option>

                                <option
                                    value="inactiva"
                                    {{ old('estado', $cabana->estado) == 'inactiva' ? 'selected' : '' }}
                                >
                                    Inactiva
                                </option>

                            </select>

                        </div>


                        {{-- Botones --}}

                        <div class="mt-8 flex items-center gap-3">

                            <button
                                type="submit"
                                class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                            >
                                Actualizar cabaña
                            </button>

                            <a
                                href="{{ route('cabanas.index') }}"
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

</x-app-layout>