<x-app-layout>

    <!-- Encabezado -->
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Editar reserva
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Modifica la información de la reserva.
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

            <!-- Tarjeta -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

                <!-- Cabecera -->
                <div class="p-6 border-b border-gray-100">

                    <p class="text-sm text-gray-500 uppercase tracking-wide">
                        Número de reserva
                    </p>

                    <h1 class="text-2xl font-bold text-green-800 mt-1">
                        {{ $reserva->numero_reserva }}
                    </h1>

                </div>


                <!-- Formulario -->
                <form
                    action="{{ route('reservas.update', $reserva) }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <div class="p-6">

                        <!-- Errores -->
                        @if ($errors->any())

                            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">

                                <p class="font-semibold text-red-700 mb-2">
                                    Hay algunos errores:
                                </p>

                                <ul class="list-disc list-inside text-sm text-red-600">

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <!-- Información -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            <!-- Cliente -->
                            <div>

                                <label
                                    for="cliente_id"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Cliente
                                </label>

                                <select
                                    name="cliente_id"
                                    id="cliente_id"
                                    required
                                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                                >

                                    @foreach ($clientes as $cliente)

                                        <option
                                            value="{{ $cliente->id }}"
                                            {{ old('cliente_id', $reserva->cliente_id) == $cliente->id ? 'selected' : '' }}
                                        >
                                            {{ $cliente->nombre }}
                                            {{ $cliente->apellido }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            <!-- Cabaña -->
                            <div>

                                <label
                                    for="cabana_id"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Cabaña
                                </label>

                                <select
                                    name="cabana_id"
                                    id="cabana_id"
                                    required
                                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                                >

                                    @foreach ($cabanas as $cabana)

                                        <option
                                            value="{{ $cabana->id }}"
                                            {{ old('cabana_id', $reserva->cabana_id) == $cabana->id ? 'selected' : '' }}
                                        >
                                            {{ $cabana->nombre }}
                                            -
                                            ${{ number_format($cabana->precio_noche, 0, ',', '.') }}
                                            por noche
                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            <!-- Fecha entrada -->
                            <div>

                                <label
                                    for="fecha_entrada"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Fecha de entrada
                                </label>

                                <input
                                    type="date"
                                    name="fecha_entrada"
                                    id="fecha_entrada"
                                    value="{{ old('fecha_entrada', $reserva->fecha_entrada->format('Y-m-d')) }}"
                                    required
                                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                                >

                            </div>


                            <!-- Fecha salida -->
                            <div>

                                <label
                                    for="fecha_salida"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Fecha de salida
                                </label>

                                <input
                                    type="date"
                                    name="fecha_salida"
                                    id="fecha_salida"
                                    value="{{ old('fecha_salida', $reserva->fecha_salida->format('Y-m-d')) }}"
                                    required
                                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                                >

                            </div>


                            <!-- Huéspedes -->
                            <div>

                                <label
                                    for="cantidad_huespedes"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Cantidad de huéspedes
                                </label>

                                <input
                                    type="number"
                                    name="cantidad_huespedes"
                                    id="cantidad_huespedes"
                                    min="1"
                                    value="{{ old('cantidad_huespedes', $reserva->cantidad_huespedes) }}"
                                    required
                                    class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                                >

                            </div>


                            <!-- Estado -->
                            <div>

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
                                        value="pendiente"
                                        {{ old('estado', $reserva->estado) === 'pendiente' ? 'selected' : '' }}
                                    >
                                        Pendiente
                                    </option>

                                    <option
                                        value="confirmada"
                                        {{ old('estado', $reserva->estado) === 'confirmada' ? 'selected' : '' }}
                                    >
                                        Confirmada
                                    </option>

                                    <option
                                        value="cancelada"
                                        {{ old('estado', $reserva->estado) === 'cancelada' ? 'selected' : '' }}
                                    >
                                        Cancelada
                                    </option>

                                    <option
                                        value="finalizada"
                                        {{ old('estado', $reserva->estado) === 'finalizada' ? 'selected' : '' }}
                                    >
                                        Finalizada
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- Resumen -->
                        <div class="mt-8 p-5 bg-green-50 border border-green-100 rounded-xl">

                            <div class="flex items-center gap-3 mb-5">

                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                    💰
                                </div>

                                <div>

                                    <h3 class="font-semibold text-gray-800">
                                        Resumen de la reserva
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        El precio se calcula automáticamente.
                                    </p>

                                </div>

                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                                <!-- Precio noche -->
                                <div class="bg-white border border-green-100 rounded-xl p-4">

                                    <p class="text-xs uppercase tracking-wide text-gray-500">
                                        Precio por noche
                                    </p>

                                    <p
                                        id="precio_noche"
                                        class="text-xl font-bold text-green-700 mt-2"
                                    >
                                        $0
                                    </p>

                                </div>


                                <!-- Noches -->
                                <div class="bg-white border border-green-100 rounded-xl p-4">

                                    <p class="text-xs uppercase tracking-wide text-gray-500">
                                        Número de noches
                                    </p>

                                    <p
                                        id="numero_noches"
                                        class="text-xl font-bold text-gray-800 mt-2"
                                    >
                                        0
                                    </p>

                                </div>


                                <!-- Total -->
                                <div class="bg-white border border-green-200 rounded-xl p-4">

                                    <p class="text-xs uppercase tracking-wide text-gray-500">
                                        Precio total
                                    </p>

                                    <p
                                        id="precio_total_mostrar"
                                        class="text-xl font-bold text-green-700 mt-2"
                                    >
                                        $0
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- Campo oculto precio -->
                        <input
                            type="hidden"
                            name="precio_total"
                            id="precio_total"
                            value="{{ old('precio_total', $reserva->precio_total) }}"
                        >


                        <!-- Observaciones -->
                        <div class="mt-8">

                            <label
                                for="observaciones"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Observaciones
                            </label>

                            <textarea
                                name="observaciones"
                                id="observaciones"
                                rows="5"
                                placeholder="Agrega cualquier información importante sobre la reserva..."
                                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
                            >{{ old('observaciones', $reserva->observaciones) }}</textarea>

                        </div>

                    </div>


                    <!-- Botones -->
                    <div class="px-6 py-5 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">

                        <a
                            href="{{ route('reservas.show', $reserva) }}"
                            class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-50 transition"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center px-5 py-2.5 bg-green-700 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-green-800 transition"
                        >
                            Actualizar reserva
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <!-- Cálculo automático -->
    <script>

        const cabanaSelect = document.getElementById('cabana_id');

        const fechaEntrada = document.getElementById('fecha_entrada');

        const fechaSalida = document.getElementById('fecha_salida');

        const precioTotal = document.getElementById('precio_total');

        const precioNoche = document.getElementById('precio_noche');

        const precioTotalMostrar = document.getElementById('precio_total_mostrar');

        const numeroNoches = document.getElementById('numero_noches');


        const preciosCabanas = {

            @foreach ($cabanas as $cabana)

                "{{ $cabana->id }}": {{ $cabana->precio_noche }},

            @endforeach

        };


        function calcularReserva() {

            const cabanaId = cabanaSelect.value;

            const entrada = fechaEntrada.value;

            const salida = fechaSalida.value;

            const precio = preciosCabanas[cabanaId] ?? 0;


            precioNoche.textContent =
                '$' + Number(precio).toLocaleString('es-CO');


            if (!entrada || !salida) {

                numeroNoches.textContent = '0';

                precioTotal.value = '';

                precioTotalMostrar.textContent = '$0';

                return;

            }


            const fechaInicio =
                new Date(entrada + 'T00:00:00');

            const fechaFin =
                new Date(salida + 'T00:00:00');


            const diferencia =
                fechaFin.getTime() - fechaInicio.getTime();


            const noches =
                Math.ceil(
                    diferencia /
                    (1000 * 60 * 60 * 24)
                );


            if (noches <= 0) {

                numeroNoches.textContent = '0';

                precioTotal.value = '';

                precioTotalMostrar.textContent = '$0';

                return;

            }


            const total = noches * precio;


            numeroNoches.textContent = noches;

            precioTotal.value = total;

            precioTotalMostrar.textContent =
                '$' + Number(total).toLocaleString('es-CO');

        }


        cabanaSelect.addEventListener(
            'change',
            calcularReserva
        );

        fechaEntrada.addEventListener(
            'change',
            calcularReserva
        );

        fechaSalida.addEventListener(
            'change',
            calcularReserva
        );


        calcularReserva();

    </script>

</x-app-layout>