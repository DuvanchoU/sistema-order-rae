<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema ORDER RAE')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- O si usas compilación manual: -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body class="bg-gray-100 min-h-screen">

    <header class="bg-blue-700 text-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-xl font-bold">ORDER RAE</h1>
            <nav>
                <a href="{{ route('productos.index') }}" class="hover:underline">Productos</a>
                <!-- Puedes añadir más enlaces luego: Clientes, Ventas, Reportes, etc. -->
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-8 px-4">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 text-sm mt-12">
        &copy; {{ date('Y') }} ORDER RAE - Desarrollado por Duvan Felipe Uribe Tejada
    </footer>

</body>
</html>