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

    <style>
        body {
            background-image: url('/storage/img/INSTALACIONES.png');
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
            <!-- Sidebar -->
            <x-sidebar />
            
            <div class="flex-1 relative">
                <!-- Topbar -->
                <x-topbar />
                
                <!-- Contenido principal -->
                <main class="p-4">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Aquí va el contenido específico del dashboard -->
                        {{-- <div class="bg-white/50 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-lg p-6">
                            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                            <!-- Agrega aquí el contenido que necesites -->
                        </div> --}}
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>