<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/circles.svg')}}" type="image/x-icon">

    @stack('styles')
    
    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    @livewireStyles
</head>

<!-- yield: directiva que registra el elemento como un contenedor he inyectar contenido -->

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        
       <livewire:navbar>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold">
        DevStagram - Todos los derechos reservados {{ now()->year }}
        {{-- los helpers son funciones que ayudan a realizar tareas 
         now() es uno y este nos otorga la fecha.
    --}}
    </footer>

    @livewireScripts
</body>

</html>
