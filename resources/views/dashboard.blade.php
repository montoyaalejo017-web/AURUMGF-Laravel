<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="font-semibold text-2xl text-green-800 leading-tight">
                Dashboard
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Administración del Glamping AURUMGF
            </p>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            {{-- Bienvenida --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl mb-6">

                <div class="p-6">

                    <h3 class="text-xl font-semibold text-gray-800">
                        ¡Bienvenido, {{ Auth::user()->name }}! 🏕️
                    </h3>

                    <p class="mt-2 text-gray-600">
                        Desde este panel puedes administrar las reservas,
                        clientes y cabañas de AURUMGF.
                    </p>

                </div>

            </div>


            {{-- Tarjetas principales --}}

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">


                {{-- RESERVAS --}}

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                    <div class="p-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-gray-500">
                                    Reservas
                                </p>

                                <p class="mt-2 text-3xl font-bold text-green-800">
                                    {{ $totalReservas }}
                                </p>

                            </div>


                            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                                <span class="text-2xl">
                                    📅
                                </span>

                            </div>

                        </div>


                        <a
                            href="{{ route('reservas.index') }}"
                            class="inline-block mt-4 text-sm font-semibold text-green-700 hover:text-green-900"
                        >
                            Gestionar reservas →
                        </a>

                    </div>

                </div>



                {{-- CLIENTES --}}

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                    <div class="p-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-gray-500">
                                    Clientes
                                </p>

                                <p class="mt-2 text-3xl font-bold text-green-800">
                                    {{ $totalClientes }}
                                </p>

                            </div>


                            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                                <span class="text-2xl">
                                    👥
                                </span>

                            </div>

                        </div>


                        <a
                            href="{{ route('clientes.index') }}"
                            class="inline-block mt-4 text-sm font-semibold text-green-700 hover:text-green-900"
                        >
                            Gestionar clientes →
                        </a>

                    </div>

                </div>



                {{-- CABAÑAS --}}

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                    <div class="p-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm font-medium text-gray-500">
                                    Cabañas
                                </p>

                                <p class="mt-2 text-3xl font-bold text-green-800">
                                    {{ $totalCabanas }}
                                </p>

                            </div>


                            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                                <span class="text-2xl">
                                    🏕️
                                </span>

                            </div>

                        </div>


                        <a
                            href="{{ route('cabanas.index') }}"
                            class="inline-block mt-4 text-sm font-semibold text-green-700 hover:text-green-900"
                        >
                            Gestionar cabañas →
                        </a>

                    </div>

                </div>

            </div>



            {{-- Acciones rápidas --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">

                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-800">
                        Acciones rápidas
                    </h3>


                    <p class="mt-1 text-sm text-gray-500">
                        Accede rápidamente a las operaciones principales.
                    </p>


                    <div class="mt-5 flex flex-wrap gap-3">


                        {{-- Nueva reserva --}}

                        <a
                            href="{{ route('reservas.create') }}"
                            class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                        >
                            + Nueva reserva
                        </a>


                        {{-- Ver reservas --}}

                        <a
                            href="{{ route('reservas.index') }}"
                            class="inline-flex items-center px-5 py-3 bg-green-50 border border-green-200 rounded-lg font-semibold text-sm text-green-800 hover:bg-green-100 transition"
                        >
                            Ver reservas
                        </a>


                        {{-- Nuevo cliente --}}

                        <a
                            href="{{ route('clientes.create') }}"
                            class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                        >
                            + Nuevo cliente
                        </a>


                        {{-- Ver clientes --}}

                        <a
                            href="{{ route('clientes.index') }}"
                            class="inline-flex items-center px-5 py-3 bg-green-50 border border-green-200 rounded-lg font-semibold text-sm text-green-800 hover:bg-green-100 transition"
                        >
                            Ver clientes
                        </a>


                        {{-- Nueva cabaña --}}

                        <a
                            href="{{ route('cabanas.create') }}"
                            class="inline-flex items-center px-5 py-3 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                        >
                            + Nueva cabaña
                        </a>


                        {{-- Ver cabañas --}}

                        <a
                            href="{{ route('cabanas.index') }}"
                            class="inline-flex items-center px-5 py-3 bg-green-50 border border-green-200 rounded-lg font-semibold text-sm text-green-800 hover:bg-green-100 transition"
                        >
                            Ver cabañas
                        </a>

                    </div>

                </div>

            </div>


        </div>

    </div>

</x-app-layout>