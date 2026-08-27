<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                    Nueva cabaña
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Registra una nueva cabaña para AURUMGF.
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


            {{-- Errores de validación --}}
            @if ($errors->any())

                <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-5">

                    <h3 class="font-semibold text-red-800">
                        Hay algunos errores:
                    </h3>

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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="p-6 sm:p-8">

                    <div class="mb-6">

                        <h3 class="text-xl font-semibold text-gray-800">
                            Información de la cabaña
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Completa los datos para registrar la cabaña.
                        </p>

                    </div>


                    <form
                        action="{{ route('cabanas.store') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- Nombre --}}
                        <div class="mb-6">

                            <label
                                for="nombre"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Nombre de la cabaña
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                id="nombre"
                                value="{{ old('nombre') }}"
                                required
                                placeholder="Ej. Cabaña Bosque Premium"
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            >

                        </div>


                        {{-- Descripción --}}
                        <div class="mb-6">

                            <label
                                for="descripcion"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Descripción
                            </label>

                            <textarea
                                name="descripcion"
                                id="descripcion"
                                rows="4"
                                placeholder="Describe brevemente la cabaña..."
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            >{{ old('descripcion') }}</textarea>

                        </div>


                        {{-- Capacidad y precio --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">


                            {{-- Capacidad --}}
                            <div>

                                <label
                                    for="capacidad"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Capacidad de huéspedes
                                </label>

                                <input
                                    type="number"
                                    name="capacidad"
                                    id="capacidad"
                                    value="{{ old('capacidad', 1) }}"
                                    min="1"
                                    required
                                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                                >

                                <p class="mt-1 text-xs text-gray-500">
                                    Número máximo de huéspedes.
                                </p>

                            </div>


                            {{-- Precio --}}
                            <div>

                                <label
                                    for="precio_noche"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Precio por noche
                                </label>

                                <div class="relative">

                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                                        $
                                    </span>

                                    <input
                                        type="number"
                                        name="precio_noche"
                                        id="precio_noche"
                                        value="{{ old('precio_noche') }}"
                                        min="0"
                                        step="1"
                                        required
                                        placeholder="320000"
                                        class="w-full pl-8 rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                                    >

                                </div>

                            </div>

                        </div>


                        {{-- Estado --}}
                        <div class="mb-6">

                            <label
                                for="estado"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Estado
                            </label>

                            <select
                                name="estado"
                                id="estado"
                                required
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            >

                                <option
                                    value="disponible"
                                    {{ old('estado', 'disponible') === 'disponible' ? 'selected' : '' }}
                                >
                                    Disponible
                                </option>

                                <option
                                    value="mantenimiento"
                                    {{ old('estado') === 'mantenimiento' ? 'selected' : '' }}
                                >
                                    Mantenimiento
                                </option>

                                <option
                                    value="ocupada"
                                    {{ old('estado') === 'ocupada' ? 'selected' : '' }}
                                >
                                    Ocupada
                                </option>

                            </select>

                        </div>


                        {{-- Observaciones --}}
                        <div class="mb-8">

                            <label
                                for="observaciones"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Observaciones
                            </label>

                            <textarea
                                name="observaciones"
                                id="observaciones"
                                rows="4"
                                placeholder="Información adicional sobre la cabaña..."
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            >{{ old('observaciones') }}</textarea>

                        </div>


                        {{-- Botones --}}
                        <div class="flex items-center justify-end gap-3">

                            <a
                                href="{{ route('cabanas.index') }}"
                                class="inline-flex items-center px-5 py-3 bg-gray-100 border border-gray-200 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-200 transition"
                            >
                                Cancelar
                            </a>


                            <button
                                type="submit"
                                class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                            >
                                Guardar cabaña
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>