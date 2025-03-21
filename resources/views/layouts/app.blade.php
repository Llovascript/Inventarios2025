<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/topbar.css', 'resources/js/topbar.js', 'resources/css/sidebar.css', 'resources/js/sidebar.js'])
        
        <!-- Estilos personalizados -->
        <style>
            body {
                background-image: url('{{ asset('/storage/img/INSTALACIONES.png') }}');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                background-repeat: no-repeat;
                min-height: 100vh;
            }

        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="content-wrapper">
            <div class="flex min-h-screen">
                
                
                <div class="flex-1 relative">
                    
                    
                    <!-- Contenido principal -->
                    <main class="main-content p-4">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>