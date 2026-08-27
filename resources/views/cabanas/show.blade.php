<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                    Detalle de la cabaña
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Consulta la información de esta cabaña.
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

                    {{-- Encabezado de la cabaña --}}

                    <div class="flex items-start justify-between">

                        <div>

                            <h3 class="text-2xl font-bold text-gray-800">
                                {{ $cabana->nombre }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                Información general de la cabaña
                            </p>

                        </div>


                        {{-- Estado --}}

                        @if($cabana->estado === 'disponible')

                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                Disponible
                            </span>

                        @elseif($cabana->estado === 'mantenimiento')

                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                Mantenimiento
                            </span>

                        @else

                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-700">
                                Inactiva
                            </span>

                        @endif

                    </div>


                    {{-- Información --}}

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-5">


                        {{-- Capacidad --}}

                        <div class="bg-gray-50 rounded-xl p-5">

                            <p class="text-sm font-medium text-gray-500">
                                Capacidad
                            </p>

                            <p class="mt-2 text-xl font-semibold text-gray-800">
                                {{ $cabana->capacidad }}
                                {{ $cabana->capacidad == 1 ? 'huésped' : 'huéspedes' }}
                            </p>

                        </div>


                        {{-- Precio --}}

                        <div class="bg-green-50 rounded-xl p-5">

                            <p class="text-sm font-medium text-gray-500">
                                Precio por noche
                            </p>

                            <p class="mt-2 text-xl font-bold text-green-800">
                                ${{ number_format($cabana->precio_noche, 0, ',', '.') }}
                            </p>

                        </div>

                    </div>


                    {{-- Descripción --}}

                    <div class="mt-6">

                        <h4 class="text-lg font-semibold text-gray-800">
                            Descripción
                        </h4>

                        <div class="mt-3 bg-gray-50 rounded-xl p-5">

                            @if($cabana->descripcion)

                                <p class="text-gray-700 leading-relaxed">
                                    {{ $cabana->descripcion }}
                                </p>

                            @else

                                <p class="text-gray-500 italic">
                                    No hay una descripción registrada.
                                </p>

                            @endif

                        </div>

                    </div>


                    {{-- Acciones --}}

                    <div class="mt-8 flex flex-wrap gap-3">

                        <a
                            href="{{ route('cabanas.edit', $cabana) }}"
                            class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                        >
                            Editar cabaña
                        </a>


                        <a
                            href="{{ route('cabanas.index') }}"
                            class="inline-flex items-center px-5 py-3 bg-gray-100 border border-gray-200 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-200 transition"
                        >
                            Volver a cabañas
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>