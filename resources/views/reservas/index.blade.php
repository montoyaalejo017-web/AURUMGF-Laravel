<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                Reservas
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Gestión de reservas del glamping AURUMGF.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Encabezado -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">

                <div>
                    <h3 class="text-xl font-semibold text-gray-800">
                        Lista de reservas
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Consulta y administra las reservas registradas.
                    </p>
                </div>

                <a
                    href="{{ route('reservas.create') }}"
                    class="inline-flex items-center justify-center px-5 py-3
                           bg-green-700 border border-transparent rounded-lg
                           font-semibold text-sm text-white
                           hover:bg-green-800
                           focus:outline-none focus:ring-2
                           focus:ring-green-500 focus:ring-offset-2
                           transition"
                >
                    + Nueva reserva
                </a>

            </div>


            <!-- Mensaje de éxito -->
            @if(session('success'))

                <div class="mb-6 rounded-lg bg-green-50 border border-green-200
                            px-5 py-4 text-sm text-green-800">
                    {{ session('success') }}
                </div>

            @endif


            <!-- Tabla -->
            <div class="bg-white shadow-sm sm:rounded-xl overflow-hidden border border-gray-100">

                <div class="overflow-x-auto">

                    <table class="min-w-full divide-y divide-gray-200">

                        <thead class="bg-green-50">

                            <tr>

                                <th class="px-5 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    ID
                                </th>

                                <th class="px-5 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    N.º Reserva
                                </th>

                                <th class="px-5 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Cliente
                                </th>

                                <th class="px-5 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Cabaña
                                </th>

                                <th class="px-5 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Entrada
                                </th>

                                <th class="px-5 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Salida
                                </th>

                                <th class="px-5 py-4 text-center text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Huéspedes
                                </th>

                                <th class="px-5 py-4 text-right text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Precio total
                                </th>

                                <th class="px-5 py-4 text-center text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Estado
                                </th>

                                <th class="px-5 py-4 text-center text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody class="bg-white divide-y divide-gray-100">

                            @forelse($reservas as $reserva)

                                <tr class="hover:bg-green-50/40 transition">

                                    <!-- ID -->
                                    <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ $reserva->id }}
                                    </td>


                                    <!-- Número de reserva -->
                                    <td class="px-5 py-4 whitespace-nowrap">

                                        <span class="font-semibold text-green-800">
                                            {{ $reserva->numero_reserva }}
                                        </span>

                                    </td>


                                    <!-- Cliente -->
                                    <td class="px-5 py-4">

                                        <div class="text-sm font-medium text-gray-800">
                                            {{ $reserva->cliente->nombre }}
                                            {{ $reserva->cliente->apellido }}
                                        </div>

                                    </td>


                                    <!-- Cabaña -->
                                    <td class="px-5 py-4">

                                        <div class="text-sm text-gray-700">
                                            {{ $reserva->cabana->nombre }}
                                        </div>

                                    </td>


                                    <!-- Entrada -->
                                    <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $reserva->fecha_entrada->format('d/m/Y') }}
                                    </td>


                                    <!-- Salida -->
                                    <td class="px-5 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $reserva->fecha_salida->format('d/m/Y') }}
                                    </td>


                                    <!-- Huéspedes -->
                                    <td class="px-5 py-4 whitespace-nowrap text-center text-sm text-gray-700">
                                        {{ $reserva->cantidad_huespedes }}
                                    </td>


                                    <!-- Precio -->
                                    <td class="px-5 py-4 whitespace-nowrap text-right">

                                        <span class="font-semibold text-gray-800">
                                            ${{ number_format($reserva->precio_total, 0, ',', '.') }}
                                        </span>

                                    </td>


                                    <!-- Estado -->
                                    <td class="px-5 py-4 whitespace-nowrap text-center">

                                        @if($reserva->estado === 'confirmada')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full
                                                         text-xs font-semibold
                                                         bg-green-100 text-green-800">
                                                Confirmada
                                            </span>

                                        @elseif($reserva->estado === 'pendiente')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full
                                                         text-xs font-semibold
                                                         bg-yellow-100 text-yellow-800">
                                                Pendiente
                                            </span>

                                        @elseif($reserva->estado === 'cancelada')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full
                                                         text-xs font-semibold
                                                         bg-red-100 text-red-800">
                                                Cancelada
                                            </span>

                                        @else

                                            <span class="inline-flex items-center px-3 py-1 rounded-full
                                                         text-xs font-semibold
                                                         bg-gray-100 text-gray-700">
                                                {{ ucfirst($reserva->estado) }}
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Acciones -->
                                    <td class="px-5 py-4 whitespace-nowrap text-center">

                                        <div class="flex items-center justify-center gap-2">

                                            <!-- Ver -->
                                            <a
                                                href="{{ route('reservas.show', $reserva) }}"
                                                class="inline-flex items-center px-3 py-2
                                                       rounded-md text-xs font-semibold
                                                       text-green-700 bg-green-50
                                                       hover:bg-green-100
                                                       transition"
                                            >
                                                Ver
                                            </a>


                                            <!-- Editar -->
                                            <a
                                                href="{{ route('reservas.edit', $reserva) }}"
                                                class="inline-flex items-center px-3 py-2
                                                       rounded-md text-xs font-semibold
                                                       text-gray-700 bg-gray-100
                                                       hover:bg-gray-200
                                                       transition"
                                            >
                                                Editar
                                            </a>


                                            <!-- Eliminar -->
                                            <form
                                                action="{{ route('reservas.destroy', $reserva) }}"
                                                method="POST"
                                                class="inline"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('¿Eliminar esta reserva?')"
                                                    class="inline-flex items-center px-3 py-2
                                                           rounded-md text-xs font-semibold
                                                           text-red-700 bg-red-50
                                                           hover:bg-red-100
                                                           transition"
                                                >
                                                    Eliminar
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="10"
                                        class="px-5 py-12 text-center"
                                    >

                                        <div class="text-gray-400 text-4xl mb-3">
                                            🏕️
                                        </div>

                                        <p class="text-gray-600 font-medium">
                                            No hay reservas registradas.
                                        </p>

                                        <p class="text-sm text-gray-400 mt-1">
                                            Crea una nueva reserva para comenzar.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>