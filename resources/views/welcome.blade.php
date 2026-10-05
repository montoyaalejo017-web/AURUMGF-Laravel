<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AURUMGF | Glamping</title>

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f8f6f0;
            color: #173b2b;
        }

        .hero {
            min-height: 90vh;
            position: relative;
            background:
                linear-gradient(
                    rgba(10, 45, 30, 0.58),
                    rgba(10, 45, 30, 0.68)
                ),
                url('{{ asset('img/hero.jpg') }}') center/cover no-repeat;
        }

        .hero-content {
            min-height: 90vh;
            display: flex;
            align-items: center;
        }

        .placeholder-image {
            background:
                linear-gradient(
                    135deg,
                    #dfe8df,
                    #b9cdbb
                );
        }

        .gallery-placeholder {
            min-height: 240px;
            background:
                linear-gradient(
                    135deg,
                    #dfe8df,
                    #b9cdbb
                );
        }
    </style>
</head>

<body>

    {{-- =========================
        NAVBAR
    ========================== --}}

    <header class="absolute top-0 left-0 right-0 z-50">

        <nav class="max-w-7xl mx-auto px-6 lg:px-8 py-5">

            <div class="flex items-center justify-between">

                {{-- LOGO ORIGINAL --}}

                <a href="{{ url('/') }}" class="flex items-center gap-3">

                    <img
                        src="{{ asset('img/logo.png') }}"
                        alt="AURUMGF"
                        class="w-12 h-12 object-contain"
                    >

                    <div>
                        <span class="block text-white text-2xl font-bold tracking-wide">
                            AURUMGF
                        </span>

                        <span class="block text-green-100 text-xs tracking-widest uppercase">
                            Glamping
                        </span>
                    </div>

                </a>


                {{-- MENU --}}

                <div class="hidden md:flex items-center gap-8">

                    <a
                        href="#inicio"
                        class="text-white hover:text-green-200 transition"
                    >
                        Inicio
                    </a>

                    <a
                        href="#cabanas"
                        class="text-white hover:text-green-200 transition"
                    >
                        Cabañas
                    </a>

                    <a
                        href="#experiencia"
                        class="text-white hover:text-green-200 transition"
                    >
                        Experiencia
                    </a>

                    <a
                        href="#galeria"
                        class="text-white hover:text-green-200 transition"
                    >
                        Galería
                    </a>

                    <a
                        href="#contacto"
                        class="text-white hover:text-green-200 transition"
                    >
                        Contacto
                    </a>

                    @auth

                        <a
                            href="{{ url('/dashboard') }}"
                            class="px-5 py-2 rounded-full bg-white text-green-900 font-semibold hover:bg-green-50 transition"
                        >
                            Administración
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="px-5 py-2 rounded-full bg-green-700 text-white font-semibold hover:bg-green-800 transition"
                        >
                            Iniciar sesión
                        </a>

                    @endauth

                </div>

            </div>

        </nav>

    </header>


    {{-- =========================
        HERO
    ========================== --}}

    <section id="inicio" class="hero">

        <div class="hero-content max-w-7xl mx-auto px-6 lg:px-8">

            <div class="max-w-3xl text-white">

                <p class="uppercase tracking-[0.3em] text-green-200 font-semibold mb-5">
                    Vive la naturaleza
                </p>

                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                    Una experiencia diferente,
                    <span class="text-green-200">
                        rodeada de naturaleza.
                    </span>
                </h1>

                <p class="text-lg md:text-xl text-green-50 leading-relaxed mb-8 max-w-2xl">
                    Descansa, desconéctate y disfruta de una experiencia
                    de glamping pensada para escapar de la rutina.
                </p>

                <div class="flex flex-wrap gap-4">

                    <a
                        href="#cabanas"
                        class="px-7 py-3 rounded-full bg-green-700 text-white font-semibold hover:bg-green-800 transition"
                    >
                        Conoce nuestras cabañas
                    </a>

                    <a
                        href="#contacto"
                        class="px-7 py-3 rounded-full border border-white text-white font-semibold hover:bg-white hover:text-green-900 transition"
                    >
                        Contáctanos
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
        PRESENTACIÓN
    ========================== --}}

    <section class="py-20 bg-white">

        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            <div class="grid md:grid-cols-2 gap-14 items-center">

                <div>

                    <p class="text-green-700 uppercase tracking-widest font-semibold mb-3">
                        Bienvenido a AURUMGF
                    </p>

                    <h2 class="text-4xl md:text-5xl font-bold text-green-950 mb-6">
                        Naturaleza, descanso y tranquilidad.
                    </h2>

                    <p class="text-gray-600 leading-relaxed mb-5">
                        En AURUMGF queremos que cada visita sea una experiencia
                        para recordar. Nuestro espacio combina comodidad,
                        naturaleza y tranquilidad para que puedas desconectarte
                        de la rutina.
                    </p>

                    <p class="text-gray-600 leading-relaxed">
                        Ya sea una escapada en pareja, un momento especial o
                        simplemente unos días para descansar, nuestras cabañas
                        están pensadas para disfrutar.
                    </p>

                </div>


                {{-- IMAGEN ABOUT --}}

                <div class="rounded-3xl overflow-hidden shadow-xl">

                    <img
                        src="{{ asset('img/about.jpg') }}"
                        alt="Experiencia AURUMGF"
                        class="w-full h-[420px] object-cover"
                        onerror="this.style.display='none'; this.parentElement.classList.add('placeholder-image');"
                    >

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
        CABAÑAS
    ========================== --}}

    <section id="cabanas" class="py-20 bg-[#f3f0e7]">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center max-w-2xl mx-auto mb-14">

                <p class="text-green-700 uppercase tracking-widest font-semibold mb-3">
                    Alojamiento
                </p>

                <h2 class="text-4xl md:text-5xl font-bold text-green-950 mb-5">
                    Nuestras cabañas
                </h2>

                <p class="text-gray-600">
                    Espacios diseñados para descansar y disfrutar
                    de una experiencia única en medio de la naturaleza.
                </p>

            </div>


            <div class="grid md:grid-cols-3 gap-8">

                {{-- CABAÑA 1 --}}

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg">

                    <div class="h-64 placeholder-image overflow-hidden">

                        <img
                            src="{{ asset('img/cabanas/cabana-1.jpg') }}"
                            alt="Cabaña AURUMGF"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none';"
                        >

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-bold text-green-950 mb-3">
                            Cabaña 1
                        </h3>

                        <p class="text-gray-600 leading-relaxed mb-5">
                            Un espacio acogedor para disfrutar de la naturaleza
                            y descansar cómodamente.
                        </p>

                        <a
                            href="{{ route('login') }}"
                            class="inline-block text-green-700 font-semibold hover:text-green-900"
                        >
                            Consultar disponibilidad →
                        </a>

                    </div>

                </article>


                {{-- CABAÑA 2 --}}

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg">

                    <div class="h-64 placeholder-image overflow-hidden">

                        <img
                            src="{{ asset('img/cabanas/cabana-2.jpg') }}"
                            alt="Cabaña AURUMGF"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none';"
                        >

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-bold text-green-950 mb-3">
                            Cabaña 2
                        </h3>

                        <p class="text-gray-600 leading-relaxed mb-5">
                            Un lugar pensado para vivir momentos especiales
                            rodeado de tranquilidad.
                        </p>

                        <a
                            href="{{ route('login') }}"
                            class="inline-block text-green-700 font-semibold hover:text-green-900"
                        >
                            Consultar disponibilidad →
                        </a>

                    </div>

                </article>


                {{-- CABAÑA 3 --}}

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg">

                    <div class="h-64 placeholder-image overflow-hidden">

                        <img
                            src="{{ asset('img/cabanas/cabana-3.jpg') }}"
                            alt="Cabaña AURUMGF"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none';"
                        >

                    </div>

                    <div class="p-7">

                        <h3 class="text-2xl font-bold text-green-950 mb-3">
                            Cabaña 3
                        </h3>

                        <p class="text-gray-600 leading-relaxed mb-5">
                            Comodidad, privacidad y naturaleza en un mismo lugar.
                        </p>

                        <a
                            href="{{ route('login') }}"
                            class="inline-block text-green-700 font-semibold hover:text-green-900"
                        >
                            Consultar disponibilidad →
                        </a>

                    </div>

                </article>

            </div>

        </div>

    </section>


    {{-- =========================
        EXPERIENCIA
    ========================== --}}

    <section id="experiencia" class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center mb-14">

                <p class="text-green-700 uppercase tracking-widest font-semibold mb-3">
                    AURUMGF
                </p>

                <h2 class="text-4xl md:text-5xl font-bold text-green-950">
                    Vive la experiencia
                </h2>

            </div>


            <div class="grid md:grid-cols-3 gap-8">

                <div class="text-center p-8">

                    <div class="text-5xl mb-5">
                        🌿
                    </div>

                    <h3 class="text-xl font-bold text-green-950 mb-3">
                        Naturaleza
                    </h3>

                    <p class="text-gray-600">
                        Disfruta de un entorno tranquilo y conectado
                        con la naturaleza.
                    </p>

                </div>


                <div class="text-center p-8">

                    <div class="text-5xl mb-5">
                        🏡
                    </div>

                    <h3 class="text-xl font-bold text-green-950 mb-3">
                        Comodidad
                    </h3>

                    <p class="text-gray-600">
                        Espacios preparados para que puedas descansar
                        y disfrutar tu estadía.
                    </p>

                </div>


                <div class="text-center p-8">

                    <div class="text-5xl mb-5">
                        ✨
                    </div>

                    <h3 class="text-xl font-bold text-green-950 mb-3">
                        Momentos especiales
                    </h3>

                    <p class="text-gray-600">
                        Crea recuerdos especiales junto a las personas
                        que más quieres.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
        GALERÍA
    ========================== --}}

    <section id="galeria" class="py-20 bg-[#f3f0e7]">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center max-w-2xl mx-auto mb-12">

                <p class="text-green-700 uppercase tracking-widest font-semibold mb-3">
                    Galería
                </p>

                <h2 class="text-4xl md:text-5xl font-bold text-green-950 mb-5">
                    Conoce AURUMGF
                </h2>

                <p class="text-gray-600">
                    Pronto podrás conocer nuestros espacios a través
                    de nuestra galería.
                </p>

            </div>


            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                @for ($i = 1; $i <= 8; $i++)

                    <div class="gallery-placeholder rounded-2xl overflow-hidden">

                        <img
                            src="{{ asset('img/galeria/imagen-' . $i . '.jpg') }}"
                            alt="Galería AURUMGF {{ $i }}"
                            class="w-full h-full min-h-[220px] object-cover"
                            onerror="this.style.display='none';"
                        >

                    </div>

                @endfor

            </div>

        </div>

    </section>


    {{-- =========================
        CTA
    ========================== --}}

    <section class="py-20 bg-green-900">

        <div class="max-w-5xl mx-auto px-6 text-center text-white">

            <p class="uppercase tracking-widest text-green-200 font-semibold mb-4">
                Tu próxima escapada
            </p>

            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                ¿Listo para vivir AURUMGF?
            </h2>

            <p class="text-green-100 text-lg max-w-2xl mx-auto mb-8">
                Descubre nuestras cabañas y comienza a planear
                una experiencia diferente.
            </p>

            <a
                href="#cabanas"
                class="inline-block px-8 py-3 bg-white text-green-900 rounded-full font-bold hover:bg-green-50 transition"
            >
                Ver cabañas
            </a>

        </div>

    </section>


    {{-- =========================
        CONTACTO
    ========================== --}}

    <section id="contacto" class="py-20 bg-white">

        <div class="max-w-6xl mx-auto px-6 lg:px-8">

            <div class="grid md:grid-cols-2 gap-12">

                <div>

                    <p class="text-green-700 uppercase tracking-widest font-semibold mb-3">
                        Contacto
                    </p>

                    <h2 class="text-4xl font-bold text-green-950 mb-6">
                        Hablemos
                    </h2>

                    <p class="text-gray-600 leading-relaxed mb-8">
                        ¿Quieres conocer más sobre nuestras cabañas,
                        disponibilidad o servicios? Ponte en contacto
                        con nosotros.
                    </p>

                    <div class="space-y-4 text-gray-700">

                        <p>
                            <strong>📍 Ubicación:</strong>
                            Próximamente
                        </p>

                        <p>
                            <strong>📞 Teléfono:</strong>
                            Próximamente
                        </p>

                        <p>
                            <strong>✉️ Email:</strong>
                            Próximamente
                        </p>

                    </div>

                </div>


                <div class="rounded-3xl bg-[#f3f0e7] p-8">

                    <h3 class="text-2xl font-bold text-green-950 mb-6">
                        Reserva tu experiencia
                    </h3>

                    <p class="text-gray-600 mb-6">
                        Para realizar una reserva o consultar disponibilidad,
                        puedes ingresar al sistema de reservas.
                    </p>

                    @auth

                        <a
                            href="{{ route('reservas.create') }}"
                            class="inline-block px-7 py-3 bg-green-700 text-white rounded-full font-semibold hover:bg-green-800 transition"
                        >
                            Crear reserva
                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-7 py-3 bg-green-700 text-white rounded-full font-semibold hover:bg-green-800 transition"
                        >
                            Iniciar sesión
                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
        FOOTER
    ========================== --}}

    <footer class="bg-green-950 text-green-100">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

            <div class="grid md:grid-cols-3 gap-10">

                {{-- MARCA --}}

                <div>

                    <div class="flex items-center gap-3 mb-4">

                        {{-- LOGO 2 SOLO EN EL FOOTER --}}

                        <img
                            src="{{ asset('img/logo2.png') }}"
                            alt="AURUMGF"
                            class="w-16 h-16 object-contain"
                        >

                        <div>

                            <p class="text-xl font-bold text-white">
                                AURUMGF
                            </p>

                            <p class="text-xs tracking-widest uppercase">
                                Glamping
                            </p>

                        </div>

                    </div>

                    <p class="text-green-200 leading-relaxed">
                        Una experiencia de descanso, naturaleza
                        y tranquilidad.
                    </p>

                </div>


                {{-- NAVEGACIÓN --}}

                <div>

                    <h3 class="text-white font-bold mb-4">
                        Navegación
                    </h3>

                    <div class="space-y-2">

                        <a
                            href="#inicio"
                            class="block hover:text-white"
                        >
                            Inicio
                        </a>

                        <a
                            href="#cabanas"
                            class="block hover:text-white"
                        >
                            Cabañas
                        </a>

                        <a
                            href="#experiencia"
                            class="block hover:text-white"
                        >
                            Experiencia
                        </a>

                        <a
                            href="#galeria"
                            class="block hover:text-white"
                        >
                            Galería
                        </a>

                        <a
                            href="#contacto"
                            class="block hover:text-white"
                        >
                            Contacto
                        </a>

                    </div>

                </div>


                {{-- SISTEMA --}}

                <div>

                    <h3 class="text-white font-bold mb-4">
                        Sistema
                    </h3>

                    <div class="space-y-2">

                        <a
                            href="{{ route('login') }}"
                            class="block hover:text-white"
                        >
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))

                            <a
                                href="{{ route('register') }}"
                                class="block hover:text-white"
                            >
                                Registrarse
                            </a>

                        @endif

                    </div>

                </div>

            </div>


            {{-- COPYRIGHT --}}

            <div class="border-t border-green-800 mt-10 pt-6 text-sm text-green-300">

                © {{ date('Y') }} AURUMGF. Todos los derechos reservados.

            </div>

        </div>

    </footer>

</body>

</html>