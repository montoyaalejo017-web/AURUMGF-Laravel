<x-app-layout>

    <!-- Encabezado -->
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Nueva reserva
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Registra una nueva reserva para AURUMGF.
                </p>
            </div>

            <a
                href="{{ route('reservas.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-green-200
                       rounded-lg text-sm font-semibold text-green-700
                       hover:bg-green-50 transition"
            >
                ← Volver a reservas
            </a>
        </div>
    </x-slot>


    <!-- Contenido -->
    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Errores -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-5">
                    <div class="flex items-start">

                        <div class="mr-3 text-red-600 text-xl">
                            ⚠
                        </div>

                        <div>
                            <h3 class="font-semibold text-red-800">
                                Hay algunos errores en el formulario
                            </h3>

                            <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            @endif


            <!-- Tarjeta principal -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <!-- Título de la tarjeta -->
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Información de la reserva
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Completa los datos para registrar la reserva.
                    </p>
                </div>


                <form action="{{ route('reservas.store') }}" method="POST">
                    @csrf

                    <div class="p-6">

                        <!-- Cliente y cabaña -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Cliente -->
                            <div>
                                <label
                                    for="cliente_id"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Cliente
                                </label>

                                <select
                                    name="cliente_id"
                                    id="cliente_id"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-green-600 focus:ring-green-600
                                           text-gray-700"
                                >
                                    <option value="">
                                        Seleccione un cliente
                                    </option>

                                    @foreach ($clientes as $cliente)
                                        <option
                                            value="{{ $cliente->id }}"
                                            {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}
                                        >
                                            {{ $cliente->nombre }} {{ $cliente->apellido }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('cliente_id')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <!-- Cabaña -->
                            <div>
                                <label
                                    for="cabana_id"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Cabaña
                                </label>

                                <select
                                    name="cabana_id"
                                    id="cabana_id"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-green-600 focus:ring-green-600
                                           text-gray-700"
                                >
                                    <option value="">
                                        Seleccione una cabaña
                                    </option>

                                    @foreach ($cabanas as $cabana)
                                        <option
                                            value="{{ $cabana->id }}"
                                            {{ old('cabana_id') == $cabana->id ? 'selected' : '' }}
                                        >
                                            {{ $cabana->nombre }} -
                                            ${{ number_format($cabana->precio_noche, 0, ',', '.') }}
                                            por noche
                                        </option>
                                    @endforeach
                                </select>

                                @error('cabana_id')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>


                        <!-- Fechas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <!-- Fecha entrada -->
                            <div>
                                <label
                                    for="fecha_entrada"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Fecha de entrada
                                </label>

                                <input
                                    type="date"
                                    name="fecha_entrada"
                                    id="fecha_entrada"
                                    value="{{ old('fecha_entrada') }}"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-green-600 focus:ring-green-600"
                                >

                                @error('fecha_entrada')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <!-- Fecha salida -->
                            <div>
                                <label
                                    for="fecha_salida"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Fecha de salida
                                </label>

                                <input
                                    type="date"
                                    name="fecha_salida"
                                    id="fecha_salida"
                                    value="{{ old('fecha_salida') }}"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-green-600 focus:ring-green-600"
                                >

                                @error('fecha_salida')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>


                        <!-- Huéspedes y estado -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <!-- Huéspedes -->
                            <div>
                                <label
                                    for="cantidad_huespedes"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Cantidad de huéspedes
                                </label>

                                <input
                                    type="number"
                                    name="cantidad_huespedes"
                                    id="cantidad_huespedes"
                                    min="1"
                                    value="{{ old('cantidad_huespedes', 1) }}"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-green-600 focus:ring-green-600"
                                >

                                @error('cantidad_huespedes')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            <!-- Estado -->
                            <div>
                                <label
                                    for="estado"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Estado
                                </label>

                                <select
                                    name="estado"
                                    id="estado"
                                    required
                                    class="w-full rounded-lg border-gray-300
                                           focus:border-green-600 focus:ring-green-600"
                                >
                                    <option
                                        value="pendiente"
                                        {{ old('estado', 'pendiente') == 'pendiente' ? 'selected' : '' }}
                                    >
                                        Pendiente
                                    </option>

                                    <option
                                        value="confirmada"
                                        {{ old('estado') == 'confirmada' ? 'selected' : '' }}
                                    >
                                        Confirmada
                                    </option>

                                    <option
                                        value="cancelada"
                                        {{ old('estado') == 'cancelada' ? 'selected' : '' }}
                                    >
                                        Cancelada
                                    </option>

                                    <option
                                        value="finalizada"
                                        {{ old('estado') == 'finalizada' ? 'selected' : '' }}
                                    >
                                        Finalizada
                                    </option>
                                </select>

                                @error('estado')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>


                        <!-- Resumen de precio -->
                        <div class="mt-8 bg-green-50 border border-green-100 rounded-xl p-5">

                            <div class="flex items-center mb-4">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-100
                                           flex items-center justify-center mr-3"
                                >
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


                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                                <!-- Precio noche -->
                                <div class="bg-white rounded-lg p-4 border border-green-100">
                                    <p class="text-xs uppercase tracking-wide text-gray-500">
                                        Precio por noche
                                    </p>

                                    <p
                                        id="precio_noche"
                                        class="text-lg font-bold text-green-700 mt-1"
                                    >
                                        $0
                                    </p>
                                </div>


                                <!-- Número noches -->
                                <div class="bg-white rounded-lg p-4 border border-green-100">
                                    <p class="text-xs uppercase tracking-wide text-gray-500">
                                        Número de noches
                                    </p>

                                    <p
                                        id="numero_noches"
                                        class="text-lg font-bold text-gray-800 mt-1"
                                    >
                                        0
                                    </p>
                                </div>


                                <!-- Total -->
                                <div class="bg-white rounded-lg p-4 border border-green-200">
                                    <p class="text-xs uppercase tracking-wide text-gray-500">
                                        Precio total
                                    </p>

                                    <p
                                        id="precio_total_visual"
                                        class="text-xl font-bold text-green-700 mt-1"
                                    >
                                        $0
                                    </p>
                                </div>

                            </div>


                            <!-- Campo real que se envía al backend -->
                            <input
                                type="hidden"
                                name="precio_total"
                                id="precio_total"
                                value="{{ old('precio_total') }}"
                            >

                        </div>


                        <!-- Observaciones -->
                        <div class="mt-6">

                            <label
                                for="observaciones"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Observaciones
                            </label>

                            <textarea
                                name="observaciones"
                                id="observaciones"
                                rows="4"
                                placeholder="Agrega cualquier información importante sobre la reserva..."
                                class="w-full rounded-lg border-gray-300
                                       focus:border-green-600 focus:ring-green-600
                                       resize-none"
                            >{{ old('observaciones') }}</textarea>

                            @error('observaciones')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    <!-- Botones -->
                    <div
                        class="px-6 py-5 bg-gray-50 border-t border-gray-100
                               flex flex-col-reverse sm:flex-row sm:justify-end gap-3"
                    >

                        <a
                            href="{{ route('reservas.index') }}"
                            class="inline-flex justify-center items-center px-5 py-2.5
                                   rounded-lg border border-gray-300 bg-white
                                   text-sm font-semibold text-gray-700
                                   hover:bg-gray-100 transition"
                        >
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="inline-flex justify-center items-center px-6 py-2.5
                                   rounded-lg bg-green-700 text-white
                                   text-sm font-semibold
                                   hover:bg-green-800
                                   focus:outline-none focus:ring-2
                                   focus:ring-green-500 focus:ring-offset-2
                                   transition"
                        >
                            Guardar reserva
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

        const precioTotalVisual = document.getElementById('precio_total_visual');

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


            // Mostrar precio por noche
            precioNoche.textContent =
                '$' + Number(precio).toLocaleString('es-CO');


            // Si faltan fechas
            if (!entrada || !salida) {

                numeroNoches.textContent = '0';

                precioTotal.value = '';

                precioTotalVisual.textContent = '$0';

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
                    diferencia / (1000 * 60 * 60 * 24)
                );


            // Fechas inválidas
            if (noches <= 0) {

                numeroNoches.textContent = '0';

                precioTotal.value = '';

                precioTotalVisual.textContent = '$0';

                return;

            }


            // Calcular total
            const total = noches * precio;


            numeroNoches.textContent = noches;

            precioTotal.value = total;

            precioTotalVisual.textContent =
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