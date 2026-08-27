<x-app-layout>

    <!-- Encabezado -->
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Clientes
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Gestión de clientes de AURUMGF.
                </p>
            </div>

            <a
                href="{{ route('clientes.create') }}"
                class="inline-flex items-center px-5 py-2.5 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
            >
                + Nuevo cliente
            </a>

        </div>
    </x-slot>


    <!-- Contenido -->
    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Encabezado de sección -->
            <div class="mb-6">

                <h1 class="text-2xl font-bold text-gray-800">
                    Lista de clientes
                </h1>

                <p class="text-gray-500 mt-1">
                    Consulta y administra los clientes registrados.
                </p>

            </div>


            <!-- Mensaje de éxito -->
            @if(session('success'))

                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">

                    <p class="text-sm font-medium text-green-700">
                        {{ session('success') }}
                    </p>

                </div>

            @endif


            <!-- Tabla -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-green-50">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Cliente
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Documento
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Teléfono
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Email
                                </th>

                                <th class="px-6 py-4 text-center text-xs font-semibold text-green-800 uppercase tracking-wider">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @forelse($clientes as $cliente)

                                <tr class="hover:bg-gray-50 transition">

                                    <!-- ID -->
                                    <td class="px-6 py-5 text-sm text-gray-500">
                                        {{ $cliente->id }}
                                    </td>


                                    <!-- Cliente -->
                                    <td class="px-6 py-5">

                                        <div class="flex items-center gap-3">

                                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-semibold">
                                                {{ strtoupper(substr($cliente->nombre, 0, 1)) }}
                                            </div>

                                            <div>

                                                <p class="font-semibold text-gray-800">
                                                    {{ $cliente->nombre }}
                                                    {{ $cliente->apellido }}
                                                </p>

                                                <p class="text-xs text-gray-500">
                                                    Cliente
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <!-- Documento -->
                                    <td class="px-6 py-5 text-sm text-gray-700">
                                        {{ $cliente->documento }}
                                    </td>


                                    <!-- Teléfono -->
                                    <td class="px-6 py-5 text-sm text-gray-700">

                                        @if($cliente->telefono)

                                            {{ $cliente->telefono }}

                                        @else

                                            <span class="text-gray-400">
                                                No registrado
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Email -->
                                    <td class="px-6 py-5 text-sm text-gray-700">

                                        @if($cliente->email)

                                            {{ $cliente->email }}

                                        @else

                                            <span class="text-gray-400">
                                                No registrado
                                            </span>

                                        @endif

                                    </td>


                                    <!-- Acciones -->
                                    <td class="px-6 py-5">

                                        <div class="flex items-center justify-center gap-2">

                                            <a
                                                href="{{ route('clientes.show', $cliente) }}"
                                                class="px-3 py-1.5 text-sm font-medium text-green-700 bg-green-50 rounded-lg hover:bg-green-100 transition"
                                            >
                                                Ver
                                            </a>


                                            <a
                                                href="{{ route('clientes.edit', $cliente) }}"
                                                class="px-3 py-1.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition"
                                            >
                                                Editar
                                            </a>


                                            <form
                                                action="{{ route('clientes.destroy', $cliente) }}"
                                                method="POST"
                                                class="inline"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('¿Eliminar este cliente?')"
                                                    class="px-3 py-1.5 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition"
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
                                        class="px-6 py-12 text-center"
                                    >

                                        <div class="text-gray-400">

                                            <div class="text-4xl mb-3">
                                                👥
                                            </div>

                                            <p class="font-medium text-gray-600">
                                                No hay clientes registrados
                                            </p>

                                            <p class="text-sm mt-1">
                                                Registra tu primer cliente para comenzar.
                                            </p>

                                        </div>

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