<x-app-layout>

    <!-- Encabezado -->
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Detalle de la reserva
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Consulta toda la información de la reserva.
                </p>
            </div>

            <a
                href="{{ route('reservas.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-green-200 rounded-lg font-semibold text-sm text-green-700 hover:bg-green-50 transition"
            >
                ← Volver a reservas
            </a>
        </div>
    </x-slot>


    <!-- Contenido -->
    <div class="py-10">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- Tarjeta principal -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

                <!-- Cabecera de la reserva -->
                <div class="p-6 border-b border-gray-100">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500 uppercase tracking-wide">
                                Número de reserva
                            </p>

                            <h1 class="text-2xl font-bold text-green-800 mt-1">
                                {{ $reserva->numero_reserva }}
                            </h1>
                        </div>

                        <!-- Estado -->
                        <div>
                            @if($reserva->estado === 'confirmada')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                    Confirmada
                                </span>

                            @elseif($reserva->estado === 'pendiente')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-700">
                                    Pendiente
                                </span>

                            @elseif($reserva->estado === 'cancelada')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                                    Cancelada
                                </span>

                            @else

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-700">
                                    {{ ucfirst($reserva->estado) }}
                                </span>

                            @endif
                        </div>

                    </div>

                </div>


                <!-- Información -->
                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        <!-- Cliente -->
                        <div class="border border-gray-100 rounded-xl p-5">

                            <p class="text-sm text-gray-500 mb-2">
                                Cliente
                            </p>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ $reserva->cliente->nombre }}
                                {{ $reserva->cliente->apellido }}
                            </p>

                        </div>


                        <!-- Cabaña -->
                        <div class="border border-gray-100 rounded-xl p-5">

                            <p class="text-sm text-gray-500 mb-2">
                                Cabaña
                            </p>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ $reserva->cabana->nombre }}
                            </p>

                        </div>


                        <!-- Fecha entrada -->
                        <div class="border border-gray-100 rounded-xl p-5">

                            <p class="text-sm text-gray-500 mb-2">
                                Fecha de entrada
                            </p>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ $reserva->fecha_entrada->format('d/m/Y') }}
                            </p>

                        </div>


                        <!-- Fecha salida -->
                        <div class="border border-gray-100 rounded-xl p-5">

                            <p class="text-sm text-gray-500 mb-2">
                                Fecha de salida
                            </p>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ $reserva->fecha_salida->format('d/m/Y') }}
                            </p>

                        </div>


                        <!-- Huéspedes -->
                        <div class="border border-gray-100 rounded-xl p-5">

                            <p class="text-sm text-gray-500 mb-2">
                                Cantidad de huéspedes
                            </p>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ $reserva->cantidad_huespedes }}
                            </p>

                        </div>


                        <!-- Precio por noche -->
                        <div class="border border-gray-100 rounded-xl p-5">

                            <p class="text-sm text-gray-500 mb-2">
                                Precio por noche
                            </p>

                            <p class="text-lg font-semibold text-green-700">
                                ${{ number_format($reserva->cabana->precio_noche, 0, ',', '.') }}
                            </p>

                        </div>


                        <!-- Número de noches -->
                        <div class="border border-gray-100 rounded-xl p-5">

                            <p class="text-sm text-gray-500 mb-2">
                                Número de noches
                            </p>

                            <p class="text-lg font-semibold text-gray-800">
                                {{ $reserva->fecha_entrada->diffInDays($reserva->fecha_salida) }}
                            </p>

                        </div>


                        <!-- Precio total -->
                        <div class="border border-green-200 bg-green-50 rounded-xl p-5">

                            <p class="text-sm text-gray-600 mb-2">
                                Precio total
                            </p>

                            <p class="text-2xl font-bold text-green-800">
                                ${{ number_format($reserva->precio_total, 0, ',', '.') }}
                            </p>

                        </div>

                    </div>


                    <!-- Observaciones -->
                    <div class="mt-6 border border-gray-100 rounded-xl p-5">

                        <p class="text-sm text-gray-500 mb-2">
                            Observaciones
                        </p>

                        @if($reserva->observaciones)

                            <p class="text-gray-700">
                                {{ $reserva->observaciones }}
                            </p>

                        @else

                            <p class="text-gray-400 italic">
                                No hay observaciones registradas.
                            </p>

                        @endif

                    </div>

                </div>


                <!-- Acciones -->
                <div class="px-6 py-5 bg-gray-50 border-t border-gray-100 flex justify-end">

                    <a
                        href="{{ route('reservas.edit', $reserva) }}"
                        class="inline-flex items-center px-5 py-2.5 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                    >
                        Editar reserva
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>