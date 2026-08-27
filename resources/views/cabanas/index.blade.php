<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                Cabañas
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Gestión de las cabañas del Glamping AURUMGF
            </p>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            {{-- Mensaje de éxito --}}
            @if(session('success'))

                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl">
                    {{ session('success') }}
                </div>

            @endif


            {{-- Encabezado --}}
            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="text-xl font-semibold text-gray-800">
                        Lista de cabañas
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Consulta y administra las cabañas registradas.
                    </p>

                </div>


                <a
                    href="{{ route('cabanas.create') }}"
                    class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                >
                    + Nueva cabaña
                </a>

            </div>


            {{-- Tabla --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-green-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Cabaña
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Capacidad
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Precio por noche
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Estado
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @forelse($cabanas as $cabana)

                                <tr class="hover:bg-gray-50 transition">

                                    {{-- ID --}}
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $cabana->id }}
                                    </td>


                                    {{-- Nombre --}}
                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-gray-800">
                                            {{ $cabana->nombre }}
                                        </div>

                                    </td>


                                    {{-- Capacidad --}}
                                    <td class="px-6 py-4 text-sm text-gray-700">

                                        {{ $cabana->capacidad }}

                                        {{ $cabana->capacidad == 1 ? 'huésped' : 'huéspedes' }}

                                    </td>


                                    {{-- Precio --}}
                                    <td class="px-6 py-4">

                                        <span class="font-semibold text-gray-800">
                                            ${{ number_format($cabana->precio_noche, 0, ',', '.') }}
                                        </span>

                                    </td>


                                    {{-- Estado --}}
                                    <td class="px-6 py-4">

                                        @if($cabana->estado === 'disponible')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                Disponible
                                            </span>

                                        @elseif($cabana->estado === 'mantenimiento')

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                                Mantenimiento
                                            </span>

                                        @else

                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                                {{ ucfirst($cabana->estado) }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Acciones --}}
                                    <td class="px-6 py-4">

                                        <div class="flex items-center gap-3">

                                            <a
                                                href="{{ route('cabanas.show', $cabana) }}"
                                                class="text-sm font-semibold text-green-700 hover:text-green-900"
                                            >
                                                Ver
                                            </a>


                                            <a
                                                href="{{ route('cabanas.edit', $cabana) }}"
                                                class="text-sm font-semibold text-blue-600 hover:text-blue-800"
                                            >
                                                Editar
                                            </a>


                                            <form
                                                action="{{ route('cabanas.destroy', $cabana) }}"
                                                method="POST"
                                                class="inline"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('¿Eliminar esta cabaña?')"
                                                    class="text-sm font-semibold text-red-600 hover:text-red-800"
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
                                        colspan="6"
                                        class="px-6 py-12 text-center text-gray-500"
                                    >
                                        No hay cabañas registradas.
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